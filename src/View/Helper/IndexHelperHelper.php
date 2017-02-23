<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * IndexHelper helper
 */
class IndexHelperHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    public $helpers = ['Html'];
    protected $_defaultConfig = [];
    public function sections($sections){
    	$str = "";
    	foreach ($sections as $section) {
	         $str .= " $section->name : <strong>".$section->_joinData->ratio." %</strong><br/>";
	     } 
	    echo $str;
    }
    public function status($id_status){
        $status = [0 => 'New', 1 => 'Completed',2 => 'Testing'];
        echo $status[$id_status];
    }

}
