<?php
namespace Province\Controller;

use Province\Controller\AppController;

/**
 * Province Controller
 *
 * @property \Province\Model\Table\ProvinceTable $Province
 */
class ProvinceController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $province = $this->paginate($this->Province);

        $this->set(compact('province'));
        $this->set('_serialize', ['province']);
    }

    /**
     * View method
     *
     * @param string|null $id Province id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $province = $this->Province->get($id, [
            'contain' => []
        ]);

        $this->set('province', $province);
        $this->set('_serialize', ['province']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $province = $this->Province->newEntity();
        if ($this->request->is('post')) {
            $province = $this->Province->patchEntity($province, $this->request->data);
            if ($this->Province->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The province could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('province'));
        $this->set('_serialize', ['province']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Province id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $province = $this->Province->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $province = $this->Province->patchEntity($province, $this->request->data);
            if ($this->Province->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The province could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('province'));
        $this->set('_serialize', ['province']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Province id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $province = $this->Province->get($id);
        if ($this->Province->delete($province)) {
            $this->Flash->success(__('The province has been deleted.'));
        } else {
            $this->Flash->error(__('The province could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /* update by unoTrung */
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
