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
     * Index method`
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
        $select = new \stdClass();
        $select->position = ['it' => 'IT Position', 'admin' => 'Admin'];
        $select->salary = ['250$ ~ 350$' => '250$ ~ 350$', '350$ ~ 500$' => '350$ ~ 500$', '550$ ~ 750$' => '550$ ~ 750$'];
        $this->set(compact('select'));
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
        $select = new \stdClass();
        $select->position = ['it' => 'IT Position', 'admin' => 'Admin'];
        $select->salary = ['250$ ~ 350$' => '250$ ~ 350$', '350$ ~ 500$' => '350$ ~ 500$', '550$ ~ 750$' => '550$ ~ 750$'];
        if ($this->request->is('post')) {

            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            // echo "<pre>"; print_r($candidate);exit();
            $candidate->score = "";
            $candidate->result = "";
            $candidate->created_date = gmdate('Y-M-dd',time()+3600*7);
            $candidate->update_date = "";
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('candidate'));
        $this->set(compact('select'));
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
        $select = new \stdClass();
        $select->position = ['it' => 'IT Position', 'admin' => 'Admin'];
        $select->salary = ['250$ ~ 350$' => '250$ ~ 350$', '350$ ~ 500$' => '350$ ~ 500$', '550$ ~ 750$' => '550$ ~ 750$'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidate = $this->Candidates->patchEntity($candidate, $this->request->data);
            if ($this->Candidates->save($candidate)) {
                $this->Flash->success(__('The candidate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The candidate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('select'));
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

        return $this->redirect($this->referer());
    }
    
    // Export candidates
    public function export() {
         
        $date = date("YmdHis");
        $this->response->download($date.'candidates.csv');
        $data = $this->Candidates->find('all')->toArray();
        $_serialize = 'data';
        $_header = ['ID', 'First Name', 'Last Name', 'Birth Day', 'Address01', 'Address02', 'Mobile',
                    'Expected Salary', 'Interview Date', 'Start Work', 'Position', 'Score', 'Result'];
        $_extract = ['id', 'first_name', 'last_name', 'birth_date', 'addr01', 'addr02', 'mobile',
                    'expected_salary', 'interview_date', 'start_work', 'position', 'score', 'result'];
        $this->set(compact('data', '_serialize', '_header', '_extract'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;
    }
    
}
