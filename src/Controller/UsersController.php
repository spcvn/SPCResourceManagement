<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;
use Province\Controller\ProvinceController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Utility\Security;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    use MailerAwareTrait;
    public function index()
    {
        $pro = new ProvinceController;
        $users = $this->paginate($this->Users);
        $status = ['0' => 'Disable', '1' => 'Active'];
        $this->set('province',$pro->getProvince());
        $this->set(compact('users'));
        $this->set(compact('status'));
        $this->set('_serialize', ['users']);

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pro = new ProvinceController;
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $user->province = array_values($pro->getProvince($user->provinceid));
        $user->district = array_values($pro->getDistrict(null,$user->districtid));
        $user->ward = array_values($pro->getWard(null,$user->wardid));
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                if($user->errors()){
                    foreach ($user->errors() as $value) {
                        $this->Flash->error(__($value[key($value)]));
                    }
                }
                // $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method     
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->updated = date("Y-m-d H:i:s");
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->status = 0;
        $user->updated = date("Y-m-d H:i:s");
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been deactive.'));
        } else {
            $this->Flash->error(__('The user could not be deactive. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout','forgotPassword','resetPassword']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if($user['status'] == 1){
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }else{
                    $this->Flash->error(__('Account is diabled, try again'));
                }
            }else{
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
        $this->viewBuilder()->layout('login-form');
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    // Active user
    public function active($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->status = 1;
        $user->updated = date("Y-m-d H:i:s");
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been active.'));
        } else {
            $this->Flash->error(__('The user could not be actived. Please, try again.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }
    public function changeUser($id = null){
        if (!empty($this->request->data)) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->dept = $user->position;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->getMailer('User')->send('memberOfSpc', [$user,$this->request->data['password']]);                
                return $this->redirect(['action' => 'index']);
            } else {
                if($user->errors()){
                    foreach ($user->errors() as $value) {
                        $this->Flash->error(__($value[key($value)]));
                    }
                }
            }
        }
        $this->loadModel('Candidates');
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]); 
        $this->set(compact('candidate'));
        $this->set('_serialize', ['candidate']);
    }
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        print_r($randomString);
        exit();
    }
    public function randomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function forgotPassword(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            $user = $this->Users->find('all')->where($this->request->data)->toArray();
            if(count($user)>0){
                $user = end($user);
                $user->token = $this->addToken($user->id,$this->randomString(8));
                $this->getMailer('User')->send('resetPassword', [$user]);
                $this->Flash->success(__('Please check your email : '.$user->email));
            }else{
                $this->Flash->error(__('The email not exist.'));
                return $this->redirect($this->Auth->logout());
            }
            $this->set('user', $user);
        }
    }
    public function resetPassword($token){
        $this->loadModel('Resetpasswords');
        if($this->request->is('post')){
            $data = $this->request->data;
            $tblReset = $this->Resetpasswords->find('all')->where(['token'=>$data['token']])->toArray();
            $user = $this->Users->get($tblReset[0]->userid);
            $user = $this->Users->patchEntity($user,$data);
            $user->updated = date("Y-m-d H:i:s");
            if($this->Users->save($user)){
                $this->Flash->success(__('The user has been change password.'));
                $re = $this->Resetpasswords->delete($tblReset[0]);
                return $this->redirect($this->Auth->logout());
            } else {
                if($user->errors()){
                    foreach ($user->errors() as $value) {
                        $this->Flash->error(__($value[key($value)]));
                    }
                }
            }
        }
        $tblReset = $this->Resetpasswords;
        $exist = $tblReset->exists(['token'=>$token,'timeout >='=>time()]);
        if(!$exist){
            $this->Flash->error(__('Not exist reset link!'));
            return $this->redirect($this->referer());
        }else{
            $this->set('token',$token);   
        }
    }
    /*
    * By UnoTrung
    * function : addToken
    * $time = 86400 = 1 day;
    * -> token live in 1 day
    */
    private function addToken($id,$token,$time = 86400){
        $this->loadModel('Resetpasswords');
        $tblReset = $this->Resetpasswords->newEntity();
        $tblReset->token    = $token;
        $tblReset->timeout  = time()+ $time;
        $tblReset->userid   = $id;
        if($this->Resetpasswords->save($tblReset)){
            return $token;
        }
        return false;
    }
}
