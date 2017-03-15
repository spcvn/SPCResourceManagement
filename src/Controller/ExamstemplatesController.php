<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examstemplates Controller
 *
 * @property \App\Model\Table\ExamstemplatesTable $Examstemplates
 */
class ExamstemplatesController extends AuthMasterController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        /*$examstemplates = $this->paginate($this->Examstemplates,[
            'contain' => ['Sections'],
            'conditions'=> ['is_delete'=>0],
            'limit'=>'100'
        ]);*/
        $examstemplates = $this->Examstemplates->find('all', [
            'contain' => ['Sections'],
            'conditions'=> ['is_delete'=>0],
            'limit'=>null
        ]);
        $quizs_test = $this->report_temp_test();
        $quizs_status = $this->report_temp_status();

        
        $this->set(compact('examstemplates','quizs_test','quizs_status'));
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
        
        $sections = $this->getSectionIds();
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
            // echo "<pre>"; print_r($this->request->data);exit();
            $examstemplate = $this->Examstemplates->patchEntity($examstemplate, $this->request->data);
            $resExamstemplate = $this->Examstemplates->save($examstemplate);
            if ($resExamstemplate) {
                $this->Flash->success(__('The examstemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The examstemplate could not be saved. Please, try again.'));
            }
        }
        $sections = $this->getSectionIds();
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
        $examstemplate->is_delete = 1;
        $examstemplate->update_date = date("Y-m-d H:i:s");
        if ($this->Examstemplates->save($examstemplate)) {
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
    public function examAssignment($id = null)
    {

        $examstemplates = $this->Examstemplates->find('all',['contain' => ['Sections']])->where(['is_delete'=>0])->toArray();
        //Load candidates
        $this->loadModel('Candidates');
        $candidates = $this->Candidates->find('list',['keyField'=>'id','valueField'=>function($val){
            return $val->last_name.' '.$val->first_name;
        }])->where(['is_delete'=>0])->toArray();

        $this->set('assign_candidate_id',$id);
        $this->set(compact('examstemplates','candidates'));
        $this->set('_serialize', ['examstemplates']);
    }
    private function report_temp_status(){
        $this->loadModel('Quizs');
        $quizs_group = $this->Quizs->find('list',[
            'keyField' => 'template_id'
 ,           'valueField'=> 'count',
        ])->select([
            'template_id',
            'count' => 'COUNT(Quizs.id)'
        ])->where(['Quizs.status > 0'])->group('template_id,status')->toArray();
        return $quizs_group;
    }

    private function report_temp_test(){
        $this->loadModel('Quizs');
        $quizs_group = $this->Quizs->find('list',[
            'keyField' => 'template_id',
            'valueField'=> 'count',
        ])->select([
            'template_id',
            'count' => 'COUNT(Quizs.id)'
        ])->group('template_id')->toArray();
        return $quizs_group;
    }
    private function _cvExamtemplate($templates){
        $str = '[';
        foreach ($templates as $val) {
            $ratio = "";
            foreach ($val->sections as $section) {
                $ratio .= $section->name.': '.$section->_joinData->ratio.'%; ';
            }
            $str.= '{ 
                label: "'.$val->name.'", 
                value: "'.$val->id.'",
                duration: "'.$val->duration.'",
                num_questions: "'.$val->num_questions.'",
                ratio: "'.$ratio.'",
            },';
        }
        $str .= ' ]';
        $str = str_replace(", ]", "]", $str);
        return $str;
    }

    private function getSectionIds(){
        $this->loadModel('Questions');
        $section_ids = $this->Questions->find('list',['keyField' => 'id',
                                'valueField' => 'section_id'])->group('section_id')->select('section_id')->where(['is_delete'=>0])->toArray();
        $sections = $this->Examstemplates->Sections->find('list', ['limit' => 200])->where(['id IN'=>$section_ids]);
        return $sections;
    }
}
