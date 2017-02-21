<?php
namespace AceTheme\View\Helper;

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
    	foreach ($examstemplate->sections as $section) {
	         $str .= " $section->name : <strong>".$section->_joinData->ratio." %</strong>;<br/>";
	     } 
	    echo $str;
    }

}
