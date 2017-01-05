<?php
namespace App\Controller;
use Cake\Event\Event;
use App\Controller\AppController;

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
    public function index()
    {
        $users = $this->paginate($this->Users);
        $status = ['0' => 'Disable', '1' => 'Active'];
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
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $user->province = array_values($this->getProvince($user->provinceid));
        $user->district = array_values($this->getDistrict(null,$user->districtid));
        $user->ward = array_values($this->getWard(null,$user->wardid));
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
        $this->set("province",$this->getProvince());
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
        $this->set("province",$this->getProvince());
        $this->set("district",$this->getDistrict());
        $this->set("ward",$this->getWard());
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
        $this->Auth->allow(['logout']);
		
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
    public function getProvince($id =null){
        $this->loadModel('Province');
        $province = $this->Province->find('list',['keyField' => 'provinceid',
                                'valueField' => 'name']);
        if($id !== null){
            $province = $province->where(['provinceid'=>$id]);
        }        
        $province = $province->toArray();
        return count($province)>0?$province:array("0"=>"---");
    }
    public function getDistrict($provinceId = null,$id = null){
        $this->loadModel('District');
        $district = $this->District
                    ->find('list',['keyField'=>'districtid','valueField' => function($dis){
                        return $dis->type." ".$dis->name;
                    }]);
        if($provinceId !== null){
            $district = $district->where(['provinceid'=>$provinceId]);
        }
        if($id !== null){
            $district = $district->where(['districtid'=>$id]);
        }
        
        $district = $district->toArray();
        return count($district)>0?$district:array("0"=>"---");
    }
    public function getWard($districtId = null,$id = null){
        $this->loadModel('Ward');
        $ward = $this->Ward
                    ->find('list',['keyField'=>'wardid','valueField' => function($dis){
                        return $dis->type." ".$dis->name;
                    }]);
        if($districtId !== null){
            $ward = $ward->where(['districtid'=>$districtId]);
        }
        if($id !== null){
            $ward = $ward->where(['wardid'=>$id]);
        }
        $ward = $ward->toArray();
        return count($ward)>0?$ward:array("0"=>"---");
    }
    public function loadAddress(){
        $data = [];
        if ($this->request->is(['post'])) {
            if(isset($this->request->data['provinceid'])){
                $data['district'] = $this->getDistrict($this->request->data['provinceid']);
            }
            if(isset($this->request->data['districtid']))
                $data['ward'] = $this->getWard($this->request->data['districtid']);
        }
        echo json_encode($data);   
        die();
    }
}
