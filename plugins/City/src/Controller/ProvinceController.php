<?php
namespace City\Controller;

use City\Controller\AppController;

/**
 * Province Controller
 *
 * @property \City\Model\Table\ProvinceTable $Province
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
}
