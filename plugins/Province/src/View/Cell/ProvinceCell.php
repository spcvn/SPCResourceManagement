<?php
namespace Province\View\Cell;

use Cake\View\Cell;
use Province\Controller\ProvinceController;

/**
 * Province cell
 */
class ProvinceCell extends Cell
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
    public function display($config = "all",$type = null,$data = null)
    {
        $pro = new ProvinceController;
        
        if($config == "all"){
            $this->set('province',true);
            $this->set('district',true);
            $this->set('ward',true);
        }
        if($config != "all"){
            $this->set('province',true);
            $this->set('district',false);
            $this->set('ward',false);
        }
        if($type == 'edit'){
            $this->set("provinceData",$pro->getProvince());
            $this->set("districtData",$pro->getDistrict());
            $this->set("wardData",$pro->getWard());      
        }else{
            $this->set('provinceData',$pro->getProvince());
            $this->set("districtData",[]);
            $this->set("wardData",[]); 
        }
        $this->set("data",$data);  
    }

}
