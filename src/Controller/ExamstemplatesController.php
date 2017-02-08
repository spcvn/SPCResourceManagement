<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examstemplates Controller
 *
 * @property \App\Model\Table\ExamstemplatesTable $Examstemplates
 */
class ExamstemplatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $examstemplates = $this->paginate($this->Examstemplates);

        $this->set(compact('examstemplates'));
        $this->set('_serialize', ['examstemplates']);
    }

    /**
     * View method
     *
     * @param string|null $id Examstemplate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examstemplate = $this->Examstemplates->get($id, [
            'contain' => []
        ]);

        $this->set('examstemplate', $examstemplate);
        $this->set('_serialize', ['examstemplate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examstemplate = $this->Examstemplates->newEntity();
        if ($this->request->is('post')) {
            $examstemplate = $this->Examstemplates->patchEntity($examstemplate, $this->request->data);
            if ($this->Examstemplates->save($examstemplate)) {
                $this->Flash->success(__('The examstemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examstemplate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examstemplate'));
        $this->set('_serialize', ['examstemplate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examstemplate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examstemplate = $this->Examstemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examstemplate = $this->Examstemplates->patchEntity($examstemplate, $this->request->data);
            if ($this->Examstemplates->save($examstemplate)) {
                $this->Flash->success(__('The examstemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examstemplate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('examstemplate'));
        $this->set('_serialize', ['examstemplate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examstemplate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examstemplate = $this->Examstemplates->get($id);
        if ($this->Examstemplates->delete($examstemplate)) {
            $this->Flash->success(__('The examstemplate has been deleted.'));
        } else {
            $this->Flash->error(__('The examstemplate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /*
    * Function Exam Assignment
    *
    */
    public function examAssignment(){

    }
}
