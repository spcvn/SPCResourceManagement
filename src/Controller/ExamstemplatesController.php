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
        $examstemplates = $this->paginate($this->Examstemplates,[
            'contain' => ['Sections']
        ]);
        $this->loadModel('Quizs');
        $quizs_group = $this->Quizs->find('list',[
            'keyField' => 'template_id',
            'valueField'=> 'count',
        ])->select([
            'template_id',
            'count' => 'COUNT(quizs.id)'
        ])->group('template_id')->toArray();
        /*$quizs_group = $this->Quizs->find('all',[
            'fields'
        ]);*/
        $this->set(compact('examstemplates','quizs_group'));
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
            'contain' => ['Sections']
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
            $resExamstemplate = $this->Examstemplates->save($examstemplate);
            if ($resExamstemplate) {
                foreach ($resExamstemplate->sections as $key=>$objSection) {
                    $exam_section = $this->Examstemplates->ExamstemplatesSections->patchEntity($objSection->_joinData,['ratio'=>$this->request->data['sections']['ratio'][$key]]);
                    $ratio = $this->Examstemplates->ExamstemplatesSections->save($exam_section);
                }
                $this->Flash->success(__('The examstemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examstemplate could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Examstemplates->Sections->find('list', ['limit' => 200]);
        $this->set(compact('examstemplate', 'sections'));
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
            'contain' => ['Sections']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examstemplate = $this->Examstemplates->patchEntity($examstemplate, $this->request->data);
            $resExamstemplate = $this->Examstemplates->save($examstemplate);
            if ($resExamstemplate) {
                $this->Flash->success(__('The examstemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examstemplate could not be saved. Please, try again.'));
            }
        }
        $sections = $this->Examstemplates->Sections->find('list', ['limit' => 200]);
        $this->set(compact('examstemplate', 'sections'));
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
        $this->request->allowMethod(['post','get', 'delete']);
        $examstemplate = $this->Examstemplates->get($id);
        if ($this->Examstemplates->delete($examstemplate)) {
            $this->Flash->success(__('The examstemplate has been deleted.'));
        } else {
            $this->Flash->error(__('The examstemplate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * examAssignment method
     *
     * @param null.
     * @return \Cake\Network\Response|null Redirects to exam_assignment.ctp.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function examAssignment()
    {
        $examstemplates = $this->Examstemplates->find('all',['contain' => ['Sections']])->where(['is_delete'=>0])->toArray();
        //Load candidates
        $this->loadModel('Candidates');
        $candidates = $this->Candidates->find('list',['keyField'=>'id','valueField'=>function($val){
            return $val->last_name.' '.$val->first_name;
        }])->where(['is_delete'=>0])->toArray();

        $this->set(compact('examstemplates','candidates'));
        $this->set('_serialize', ['examstemplates']);
    }
    
}
