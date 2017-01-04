<?php

namespace City\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
	public function initialize()
    {	
	/*	$this->loadModel('Province');
    	$pro = $this->Province->find('list');
    	$pro = $pro->toArray();
		$this->set('province', $pro);*/
	}
	public function beforeFilter(){
		
	}
}
