<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AuthMasterController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }

        $arrCounter = [
            "candidates" => $this->_countCandidate(),
            "users" => $this->_countUser(),
            "isonline" => $this->_isOnline()
        ];

        $arrRecent = [
            "listCandidate" => $this->_listCandidate()
        ];
        $this->set(compact('page', 'subpage','arrCounter', 'arrRecent'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    private function _countCandidate(){
        $this->loadModel('Candidates');
        $cCandidate = $this->Candidates->find('all')->count();
        return $cCandidate;
    }

    private function _countUser(){
        $this->loadModel('Users');
        $cUser = $this->Candidates->find('all')->count();
        return $cUser;
    }

    private function _isOnline(){
        return "5";
    }

    private function _listCandidate(){
        $this->loadModel('Candidates');
        $lCandidate = $this->Candidates->find('all',[
            'conditions'=> [ "is_delete"=>0 ],
            'order'     => [ "interview_date" => "DESC" ],
            'limit'     => 15

        ])->toArray();
        return $lCandidate;   
    }
}
