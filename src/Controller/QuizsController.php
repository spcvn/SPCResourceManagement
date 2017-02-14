<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class QuizsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
	public function index(){
		$this->paginate = ['limit' => 5, 'order' => ['id' => 'DESC']];
		$quiz = $this->Quizs->find()->contain([
		        'Candidates' => function($q){
		            return $q->select(['first_name', 'last_name'])
		                      ->autoFields(false);
		        }
		]);
        
		$quizs = $this->paginate($quiz);
		$status = ['0' => 'New', '1' => 'Completed','2' => 'Testing'];
		
		$this->set(compact('quizs'));
		$this->set(compact('status'));
		$this->set('_serialize', ['quizs']);
	}
	
	// View detail
	public function view($id = null){
	    $this->loadModel('Quizs');
	    $this->loadModel('Questions');
	    $this->loadModel('QuizDetails');
	    $this->loadModel('Answers');
	    $this->loadModel('Candidates');
	    
	    // check if null ID
	    if($id == null){
	        $this->Flash->error(__('Do not exist quiz. Please, try again.'));
	        return $this->redirect(['controller' => 'Error', 'action' => 'error404']);
	    }
	    // get Quiz information
	    $quizs = $this->Quizs->get($id);
	    
	    $candidates = $this->Candidates->get($quizs->candidate_id);
	    
	    // get questions detail
	    $quiz_details = $this->QuizDetails->find()->contain(['Questions' => ['Answers']])
                                               ->where(['QuizDetails.quiz_id' => $id]);
	    $quiz_details = $quiz_details->all();
	    // echo "<pre>";print_r($quiz_details);exit();
	    $this->set('quizs', $quizs);
	    $this->set('candidates', $candidates);
	    $this->set('quiz_details', $quiz_details);
	}
	
	/**
	 * Generate method
	 *
	 * @return \Cake\Network\Response|null
	 */
    public function generate($id = null)
    {
    	if($id == null){
    	    $this->Flash->error(__('Do not exist candidate. Please, try again.'));
    	    return $this->redirect(['controller' => 'Error', 'action' => 'error404']);
    	}
        $this->loadModel('Quizs');
        $this->loadModel('Questions');
    	if ($this->request->is('post')){
            $max = $this->Questions->find('all')->count();
            $quizs = $this->Quizs->newEntity();
    		
            $arrDatas = $this->request->data;
    		if($arrDatas['number_questions'] > $max){
    		    $this->Flash->error(__('Limit questions. Please, try again.'));
    		    return $this->redirect(['controller' => 'quizs', 'action' => 'generate', $id]);
    		}
			$quizs->candidate_id = $id;
			$quizs->total = $arrDatas['number_questions'];
			$quizs->time = $arrDatas['time'];
			
			// $date_array = $arrDatas['quiz_date'];
			// $quizs->quiz_date = date('Y-m-d H:i:s', mktime($date_array['hour'], $date_array['minute'], 0,
// 									$date_array['month'], $date_array['day'], $date_array['year']));
			$quizs->code = $this->randomCode();
			$quizs->url = $this->randomURL();
			
			if($this->Quizs->save($quizs)){
				$quiz_id = $quizs->id;
				$this->registerQuizDetail($quiz_id, $arrDatas['number_questions']);
				$linkURL = $quizs->url;
				return $this->redirect(['action' => 'generate_done', $linkURL]);
			}
			else{
				$this->Flash->error(__('The quizs could not be saved. Please, try again.'));
			}
    	}
    	
    }
    
    // Do Quiz
    public function test($url){
    	$this->loadModel('Quizs');
    	$this->loadModel('Questions');
    	$this->loadModel('QuizDetails');
    	$this->loadModel('Answers');
    	$this->loadModel('Candidates');
    	// check quiz is exist
    	$quizId = $this->Quizs->find('all', ['fields' => ['id','ipaddress']])->where(['url' => $url])->first();
    	if(isset($quizId)){
    		$quiz_id = $quizId->toArray()['id'];
    	}else{
    		$this->Flash->error(__('The quiz could not be loaded. Please, try again.'));
    		return $this->redirect(['controller' => 'Error', 'action' => 'notExistQuiz']);
    	}
    	// check status of quiz
    	$status = $this->Quizs->get($quiz_id, ['fields' => 'status'])->toArray();
    	if($status['status'] > 0){
            if ($status['status'] == 2) {
                if($_SERVER['REMOTE_ADDR'] != $quizId->ipaddress){
                    return $this->redirect(['action' => 'complete']);
                }
            }else{
    		  return $this->redirect(['action' => 'complete']);
            }
    	}
    	
    	// check time duration
    	$quiz_date = $this->Quizs->get($quiz_id, ['fields' => 'quiz_date'])->toArray();
    	$time = $this->Quizs->get($quiz_id, ['fields' => 'time'])->toArray();
    	$time = $time['time'] * 60;
    	$now = date("Y-m-d H:i:s");
    	if(isset($quiz_date['quiz_date'])){
    		$quiz_date = $quiz_date['quiz_date']->i18nFormat('yyyy-MM-dd HH:mm:ss');
    		$duration = strtotime($now) - strtotime($quiz_date);
    		if($duration > $time){
    			return $this->redirect(['action' => 'complete']);
    		}else{
    			$time = $time - $duration;
    		}
    	}
    	else{
    		$quiz = $this->Quizs->get($quiz_id);
    		$quiz->quiz_date = $now;
    		$this->Quizs->save($quiz);
    	}
    	
    	// show list questions
    	$candidate_id = $this->Quizs->get($quiz_id, ['fields' => 'candidate_id'])->toArray();
    	$total = 0;//$this->Quizs->get($quiz_id, ['fields' => 'total'])->toArray();
    	
    	$candidate_info = $this->Candidates->get($candidate_id)->toArray();
    	
    	$arrQuestions = [];
    	$question_ids = $this->QuizDetails->find('all', ['fields' => 'question_id'])
    										->where(['quiz_id' => $quiz_id]);
    	$question_ids = $question_ids->all()->toArray();
		foreach($question_ids as $question_id){
			$content = $this->Questions->get($question_id->question_id, ['fields' => 'content'])->toArray();
			$answers = $this->Answers->find('list', ['keyField' => 'id',
					'valueField' => 'answer',])
					->where(['question_id' => $question_id->question_id])
					->toArray();
			$arrQuestions[] = ['id' => $question_id->question_id,
								'content' => $content['content'],
								'answer' => $answers
								];
		}
		if ($this->request->is('post')) {
			$arrAnswers = $this->request->data;
            // save QuizDetail
            $correct = 0;
            for($i=1; $i<=$total['total']; $i++){
                if(isset($arrAnswers['answer'.$i])){
                    $is_correct = $this->updateAnswer($quiz_id, $arrAnswers['question_id'.$i], $arrAnswers['answer'.$i]);
                }else{
                    continue;
                }
                if($is_correct == 1){
                    $correct++;
                }
            }
			// save Quiz
			$arrDatas = [];
			$arrDatas['score'] = $correct;
			$arrDatas['status'] = $this->request->data['status'];
			
			$quizs = TableRegistry::get('Quizs');
			$quiz = $quizs->get($quiz_id);
			$quizs->patchEntity($quiz, $arrDatas);

			if($quizs->save($quiz)){
				return $this->redirect(['action' => 'complete']);
			}
			else{
				$this->Flash->error(__('The quizs could not be saved. Please, try again.'));
			}
		}
		$quizId->status = 2;//status is testing
        $quizId->ipaddress = $_SERVER['REMOTE_ADDR'];
        if(!$this->Quizs->save($quizId)){
            return $this->redirect(['controller' => 'Error', 'action' => 'notExistQuiz']);
        }

		$this->set('time', $time);
    	$this->set(compact('candidate_info'));
    	$this->set(compact('arrQuestions'));
        $this->viewBuilder()->layout('test-layout');
    }
    
    public function randomCode(){
    	$arr = ['a','b','c','d','e','f','g','h','1','2','3','4','5','6','7','8'];
    	$result = '';
    	for($i=1; $i<=10; $i++){
    		$result .= $arr[array_rand($arr)];
    	}
    	
    	return $result;
    }
    
    public function randomURL(){
    	$arr = ['a','b','c','d','e','f','g','h','1','2','3','4','5','6','7','8'];
    	$result = '';
    	for($i=1; $i<=10; $i++){
    		$result .= $arr[array_rand($arr)];
    	}
    	return $result;
    }
    
    public function registerQuizDetail($quiz_id, $num){
    	$this->loadModel('Questions');
    	$this->loadModel('QuizDetails');
    	
    	$arrQuestions = $this->Questions->find('list', ['fields' => 'id'])
    									->where(['status' => 1])
                                        ->order('rand()')
                                        ->limit($num)
                                        ->toArray();
    	$arrQuestionQuizs = [];
    	
    	while(count($arrQuestionQuizs) < $num){
    		$id = $arrQuestions[array_rand($arrQuestions)];
    		if(!in_array($id, $arrQuestionQuizs)){
    			$arrQuestionQuizs[] = $id;
    		}
    	}
    	foreach($arrQuestionQuizs as $arrQuestionQuiz){
    		$arrQuizDetail = $this->QuizDetails->newEntity();
    		$arrQuizDetail->quiz_id = $quiz_id;
    		$arrQuizDetail->question_id = $arrQuestionQuiz;
    		
    		$this->QuizDetails->save($arrQuizDetail);
    	}
        // exit();
    }
    
    public function updateAnswer($quiz_id, $question_id, $answer_id){
    	$this->loadModel('Answers');
        $this->loadModel('QuizDetails');
        $is_correct = $this->Answers->get($answer_id,['fields'=>'is_correct'])->toArray();
        $quizDetail = $this->QuizDetails->newEntity();
        $quizDetail->quiz_id = $quiz_id;
        $quizDetail->question_id = $question_id;
        $quizDetail->answer_id = $answer_id;
        $quizDetail->is_correct = $is_correct['is_correct'];
    	if($this->QuizDetails->save($quizDetail)){
    		return $is_correct['is_correct'];
    	}
    	else{
    		$this->Flash->error(__('The quizs could not be saved. Please, try again.'));
    	}
    }
    
    public function complete(){
        $this->viewBuilder()->layout('test-layout');
    	
    }
    
    public function generateDone($url){
        $this->set('root_path', $this->request->env('HTTP_HOST'));
    	$this->set(compact('url'));
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['test', 'complete']);
    
    }
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event); // TODO: Change the autogenerated stub
        $this->set('title','Quizs');
    }
}
