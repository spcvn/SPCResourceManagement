<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
    public function generate()
    {
    	$this->loadModel('Quizs');
    	
    	$quizs = $this->Quizs->newEntity();
    	if ($this->request->is('post')){
    		$arrDatas = $this->request->data;
    		
			$quizs->candidate_id = $arrDatas['candidate'];
			$quizs->total = $arrDatas['number_questions'];
			$quizs->time = $arrDatas['time'];
			
			$date_array = $arrDatas['quiz_date'];
// 			$quizs->quiz_date = date('Y-m-d H:i:s', mktime($date_array['hour'], $date_array['minute'], 0,
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
    	$quizId = $this->Quizs->find('all', ['fields' => 'id'])->where(['url' => $url])->first();
    	if(isset($quizId)){
    		$quiz_id = $quizId->toArray()['id'];
    	}else{
    		$this->Flash->error(__('The quiz could not be loaded. Please, try again.'));
    		return $this->redirect(['controller' => 'Error', 'action' => 'notExistQuiz']);
    	}
    	
    	// check status of quiz
    	$status = $this->Quizs->get($quiz_id, ['fields' => 'status'])->toArray();
    	if($status['status'] == 1){
    		return $this->redirect(['action' => 'complete']);
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
    	$total = $this->Quizs->get($quiz_id, ['fields' => 'total'])->toArray();
    	
    	$candidate_info = $this->Candidates->get($candidate_id)->toArray();
    	$candidate_name = $candidate_info['first_name'] . ' ' . $candidate_info['last_name'];
    	
    	$arrQuestions = [];
    	$question_ids = $this->QuizDetails->find('all', ['fields' => 'question_id'])
    										->where(['quiz_id' => $quiz_id]);
    	$question_ids = $question_ids->all()->toArray();
		foreach($question_ids as $question_id){
			$content = $this->Questions->get($question_id->question_id, ['fields' => 'content'])->toArray();
			$answers = $this->Answers->find('list', ['keyField' => 'answer_id',
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
			$arrDatas['correct'] = $correct;
			$arrDatas['status'] = 1;
			
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
		
		$this->set('time', $time);
    	$this->set(compact('candidate_name'));
    	$this->set(compact('arrQuestions'));
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
    									->where(['status' => 1])->toArray();
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
    }
    
    public function updateAnswer($quiz_id, $question_id, $answer_id){
    	$this->loadModel('Answers');
    	$this->loadModel('QuizDetails');
    	
    	$is_correct = $this->Answers->get([$answer_id, $question_id], ['fields' => 'is_correct'])->toArray();
    	$quizDetail = $this->QuizDetails->newEntity();
    	$quizDetail->quiz_id = $quiz_id;
    	$quizDetail->question_id = $question_id;
    	$quizDetail->answer = $answer_id;
    	$quizDetail->is_correct = $is_correct['is_correct'];
    	if($this->QuizDetails->save($quizDetail)){
    		return $is_correct['is_correct'];
    	}
    	else{
    		$this->Flash->error(__('The quizs could not be saved. Please, try again.'));
    	}
    }
    
    public function complete(){
    	;
    }
    
    public function generateDone($url){
    	$this->set(compact('url'));
    }
}
