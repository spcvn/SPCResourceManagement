<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Inbox cell
 */
class InboxCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    }
    /* update by unoTrung */
    public function getProvince($id =null){
        $this->loadModel('Province');
        $province = $this->Province->find('list',['keyField' => 'provinceid', 'valueField' => 'name']);
        if($id !== null){
            $province = $province->where(['provinceid'=>$id]);
        }        
        $province = $province->toArray();
        return count($province)>0?$province:array("0"=>"---");
    }
}
