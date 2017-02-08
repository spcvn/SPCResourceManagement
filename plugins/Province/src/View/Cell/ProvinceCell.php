<?php
namespace Province\View\Cell;

use Cake\View\Cell;
use Province\Controller\ProvincesController;

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
        $pro = new ProvincesController;
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
            
            /*
            *    change object to array for select box District
            */
            $districts = $pro->getDistrict();
            $optionDistrict = [];
            foreach ($districts as $district) {
                $optionDistrict[$district->districtid] = $district->type.' '.$district->name;
            }

            /*
            *    change object to array for select box Ward
            */
            $wards = $pro->getWard();
            $optionWard = [];
            foreach ($wards as $ward) {
                $optionWard[$ward->wardid] = $ward->type.' '.$ward->name;
            }
            $this->set("provinceData",$pro->getProvince());
            $this->set("districtData",$optionDistrict);
            $this->set("wardData",$optionWard);      
        }else{
            $this->set('provinceData',$pro->getProvince());
            $this->set("districtData",[]);
            $this->set("wardData",[]); 
        }
        $this->set("data",$data);  
    }

}
