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
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
       public function initialize()
    {	
	   parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        /*$this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'AuthMaster',
                'action' => 'login'
                
            ]
        ]);*/
		
        // $this->set('is_login', $this->Auth->user());
    }
    function getDevelopMode(){

        $develop_mode="web";
        $hostname=strtolower(gethostname());
        if((preg_match("#spc#",$hostname)))   $develop_mode="dev";
        if((preg_match("#desktop-v1fq2s5#",$hostname))) $develop_mode="local";
        if((preg_match("#laptop-eln3pr95#",$hostname))) $develop_mode="local";

        return $develop_mode;
    }

    public $paginate = [
        'maxLimit' => 10
	];
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // $this->Auth->allow(['test', 'complete']);
    }
    //...
    public function beforeRender(Event $event)
    {
        $develop_mode = $this->getDevelopMode();
        if($develop_mode == 'local'){
            $this->viewBuilder()->theme('AceTheme');
            $this->_setErrorLayout();
        }
        $this->set('theme', Configure::read('Admin'));

    }

    public function _setErrorLayout() {  
     if ($this->name == 'CakeError') {  
        $this->layout = 'error';  
     }    
}  
	
}