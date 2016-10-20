<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Candidates Controller
 *
 * @property \App\Model\Table\CandidatesTable $Candidates
 */
class CandidatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
	 
     */
	 public $paginate = [
    // Other keys here.
    'maxLimit' => 10
	];

    public function index()
    {
        $candidates = $this->paginate($this->Candidates);

        $this->set(compact('candidates'));
        $this->set('_serialize', ['candidates']);
    }

    /**
     * View method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]);

        $this->set('candidate', $candidate);
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidate = $this->Candidates->newEntity();
        if ($this->request->is('post')) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidate'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidate = $this->Candidates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidate'));
        $this->set('_serialize', ['candidate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidate = $this->Candidates->get($id);
        if ($this->Candidates->delete($candidate)) {
            $this->Flash->success(__('The candidate has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
