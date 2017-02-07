<?php
namespace Province\Controller;

use Province\Controller\AppController;

/**
 * Provinces Controller
 *
 * @property \Province\Model\Table\ProvincesTable $Provinces
 */
class ProvincesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $provinces = $this->paginate($this->Provinces);

        $this->set(compact('provinces'));
        $this->set('_serialize', ['provinces']);
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
        $province = $this->Provinces->get($id, [
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
        $province = $this->Provinces->newEntity();
        if ($this->request->is('post')) {
            $province = $this->Provinces->patchEntity($province, $this->request->data);
            if ($this->Provinces->save($province)) {
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
        $province = $this->Provinces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $province = $this->Provinces->patchEntity($province, $this->request->data);
            if ($this->Provinces->save($province)) {
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
        $province = $this->Provinces->get($id);
        if ($this->Provinces->delete($province)) {
            $this->Flash->success(__('The province has been deleted.'));
        } else {
            $this->Flash->error(__('The province could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /* update by unoTrung */
    /**
     * GET* method
     *
     * @param string|null $id Province id.
     * @return type : array()
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getProvince($id =null){
        $provinces = $this->Provinces->find('list',['keyField' => 'provinceid',
                                'valueField' => 'name']);
        if($id !== null){
            $provinces = $provinces->where(['provinceid'=>$id]);
        }        
        $provinces = $provinces->toArray();
        return count($provinces)>0?$provinces:array("0"=>"---");
    }
    public function getDistrict($provinceId = null,$id = null){
        $this->loadModel('Districts');
        $districts = $this->Districts
                    ->find('list',['keyField'=>'districtid','valueField' => function($dis){
                        return $dis->type." ".$dis->name;
                    }]);
        if($provinceId !== null){
            $districts = $districts->where(['provinceid'=>$provinceId]);
        }
        if($id !== null){
            $districts = $districts->where(['districtid'=>$id]);
        }
        
        $districts = $districts->toArray();
        return count($districts)>0?$districts:array("0"=>"---");
    }
    public function getWard($districtId = null,$id = null){
        $this->loadModel('Wards');
        $wards = $this->Wards
                    ->find('list',['keyField'=>'wardid','valueField' => function($dis){
                        return $dis->type." ".$dis->name;
                    }]);
        if($districtId !== null){
            $wards = $wards->where(['districtid'=>$districtId]);
        }
        if($id !== null){
            $wards = $wards->where(['wardid'=>$id]);
        }
        $wards = $wards->toArray();
        return count($wards)>0?$wards:array("0"=>"---");
    }

    /**
     * loadAddress method
     *
     * @return type : json
     * Load Address when edit form
     */
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
