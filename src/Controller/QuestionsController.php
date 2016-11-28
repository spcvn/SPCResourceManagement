<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

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
        $this->paginate = ['limit' => 5, 
                            'order' => ['id' => 'DESC']];
    	$questions = $this->paginate($this->Questions);
    	
    	$this->loadModel('Sections');
    	$sections = $this->Sections->find('list');
    	$sections = $sections->toArray();
    	
    	$ranks = ['1' => 'Easy', '2' => 'Medium'];
    	$status = ['0' => 'Unused', '1' => 'Use'];
    	
    	$this->set(compact('sections'));
    	$this->set(compact('ranks'));
    	$this->set(compact('status'));
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
        
        $this->loadModel('Sections');
        $sections = $this->Sections->find('list');
        $sections = $sections->toArray();
         
        $ranks = ['1' => 'Easy', '2' => 'Medium'];
        $status = ['0' => 'Unused', '1' => 'Use'];
         
        $this->set(compact('sections'));
        $this->set(compact('ranks'));
        $this->set(compact('status'));

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
                
                return $this->redirect(['action' => 'index']);
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
        		
        		return $this->redirect(['action' => 'edit', $id]);
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
        $question->status = 0;
        if ($this->Questions->save($question)) {
            $this->Flash->success(__('The question has been deactive.'));
        } else {
            $this->Flash->error(__('The question could not be deactive. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    // Active question
    public function active($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        $question->status = 1;
        if ($this->Questions->save($question)) {
            $this->Flash->success(__('The question has been active.'));
        } else {
            $this->Flash->error(__('The question could not be actived. Please, try again.'));
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
    
    // Export questions
    public function exportQuestion() {
    	
    	$date = date("YmdHis");
    	$this->response->download($date.'questions.csv');
    	$data = $this->Questions->find('all')->toArray();
    	$_serialize = 'data';
    	$_header = ['ID', 'Content', 'Section', 'Rank', 'Status'];
    	$_extract = ['id', 'content', 'section', 'rank', 'status'];
    	$this->set(compact('data', '_serialize', '_header', '_extract'));
    	$this->viewBuilder()->className('CsvView.Csv');
    	return;
    }
    
    // Export answers
    public function exportAnswer() {
        $this->loadModel('Answers');
        $date = date("YmdHis");
        $this->response->download($date.'answers.csv');
        $data = $this->Answers->find('all')->order(['question_id' => 'ASC'])->toArray();
        $_serialize = 'data';
        $_header = ['Question_id', 'Answer_id', 'Answer', 'Is_correct'];
        $_extract = ['question_id', 'answer_id', 'answer', 'is_correct'];
        $this->set(compact('data', '_serialize', '_header', '_extract'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;
    }
    
    // import
    public function import(){
    	$csvFiles = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    	if ($this->request->is('post')) {
    		if($_FILES['questions']['name'] == null || $_FILES['answers']['name'] == null){
    			$this->Flash->error(__('Please choose file.'));
    		}
    		else{
    			if(!in_array($_FILES['questions']['type'], $csvFiles) || !in_array($_FILES['answers']['type'], $csvFiles)){
    				$this->Flash->error(__('Invalid files type.'));
    			}
    			else{
    				// create folder upload
    				$dir = new Folder(DS . 'upload');
    				if(is_null($dir->path)){
    					$dir = new Folder();
    					$dir->create(DS . 'upload', true, 0755);

    				}
    				$dir->cd('upload/');

    				// upload question
	    			$questionName = date("YmdHis") . 'question.csv';
	    			$tmp_question = $_FILES['questions']['tmp_name'];
	    			move_uploaded_file($tmp_question, $dir->path.$questionName);
	    			
	    			$questionPath = $this->sfEncodeFile($dir->path.$questionName, 'UTF-8', $dir->path);

	    			// upload answer
	    			$answerName = date("YmdHis") . 'answer.csv';
	    			$tmp_answer = $_FILES['answers']['tmp_name'];
	    			move_uploaded_file($tmp_answer, $dir->path.$answerName);
	    			$answerPath = $this->sfEncodeFile($dir->path.$answerName, 'UTF-8', $dir->path);
    				
	    			// call import
	    			$this->importQuestion($questionPath);
	    			$this->importAnswer($answerPath);
    			}
    			
    		}
    	}
    }
    // Import questions
    public function importQuestion($file){
        $this->loadModel('Questions');
        $arrQuestion = ['id', 'content', 'section', 'rank', 'status'];
        
        $fp = fopen($file, "r");
        
        $line_count = 0;
        
        while (!feof($fp)) {
            $arrCSV = fgetcsv($fp, 1000);
        
            $line_count++;
            if($line_count == 1){
                continue;
            }
            if(empty($arrCSV)){
                continue;
            }
            $arrDatas = [];
            $arrDatas = array_combine($arrQuestion, $arrCSV);
            
            $question = $this->Questions->newEntity();
            $question->accessible('id', true);
            $question = $this->Questions->patchEntity($question, $arrDatas);
            $this->Questions->save($question);
        }
        
        fclose($fp);
    }
    
    // Import answers
    public function importAnswer($file){
        $this->loadModel('Answers');
        $arrAnswer = ['question_id', 'answer_id', 'answer', 'is_correct'];
        $fp = fopen($file, "r");
        
        $line_count = 0;
        
        while (!feof($fp)) {
            $arrCSV = fgetcsv($fp, 1000);
        
            $line_count++;
            if($line_count == 1){
                continue;
            }
            if(empty($arrCSV)){
                continue;
            }
            $arrDatas = [];
            $arrDatas = array_combine($arrAnswer, $arrCSV);
            $answer = $this->Answers->newEntity();
            $answer = $this->Answers->patchEntity($answer, $arrDatas);
            $this->Answers->save($answer);
        }
        
        fclose($fp);
    }
    
    public function sfEncodeFile($filepath, $enc_type, $out_dir)
    {
        $ifp = fopen($filepath, 'r');
    
        if ($ifp !== false) {
            $basename = basename($filepath);
            $outpath = $out_dir . 'enc_' . $basename;
    
            $ofp = fopen($outpath, 'w+');
    
            while (!feof($ifp)) {
                $line = fgets($ifp);
                $line = mb_convert_encoding($line, $enc_type, 'ASCII, JIS,UTF-8, EUC-JP, SJIS-Win, SJIS');
                fwrite($ofp,  $line);
            }
    
            fclose($ofp);
            fclose($ifp);
        }
        else {
            $this->Flash->error(__('Can not open file.'));
            exit;
        }
    
        return $outpath;
    }
}
