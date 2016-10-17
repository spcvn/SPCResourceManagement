<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
        $this->set('_serialize', ['questions']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Answers', 'QuizDetails']
        ]);

        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Sections');
        $sections = $this->Sections->find('list');
        $section = $sections->toArray();
        $this->set(compact('section'));
        
        
    	$question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
        	$arrDatas = $this->request->data;
        	
            $question->content = $arrDatas['content'];
            $question->section = $arrDatas['section'];
            $question->rank = $arrDatas['rank'];
            if ($this->Questions->save($question)) {
                $question_id = $question->id;
                $this->registerAnswer($question_id, $arrDatas);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$this->loadModel('Answers');
    	
    	$this->loadModel('Sections');
    	$section = $this->Sections->find('list')->toArray();
    	$this->set(compact('section'));
    	
    	$question = $this->Questions->get($id);
    	$answers = $this->Answers->find('list', ['keyField' => 'answer_id',
    							'valueField' => 'answer',])
    							->where(['question_id' => $id])
    							->toArray();
    	
    	$correct_answer = $this->Answers->find('list', ['keyField' => 'answer_id',
				    			'valueField' => 'answer',])
				    			->where(['question_id' => $id, 'is_correct' => 1])
				    			->toArray();
        if ($this->request->is(['patch', 'post', 'put'])) {
        	$arrDatas = $this->request->data;
        	 
        	$question->content = $arrDatas['content'];
        	$question->section = $arrDatas['section'];
        	$question->rank = $arrDatas['rank'];
        	if ($this->Questions->save($question)) {
        		$this->registerAnswer($id, $arrDatas);
        	} else {
        		$this->Flash->error(__('The question could not be saved. Please, try again.'));
        	}
        }
        $this->set(compact('answers'));
        $this->set(compact('correct_answer'));
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function registerAnswer($question_id, $arrDatas){
    	$this->loadModel('Answers');
    	for($i = 1; $i <= 10; $i++){
    		$answer = $this->Answers->newEntity();
    		
    		if(!isset($arrDatas['answer'.$i])) {
    			break;
    		}
    		$answer->question_id = $question_id;
    		$answer->answer_id = $i;
    		$answer->answer = $arrDatas['answer'.$i];
    		$answer->is_correct = ($i == $arrDatas['correct_answer'])? 1:0;
    		
    		$this->Answers->save($answer);
    	}
    }
}
