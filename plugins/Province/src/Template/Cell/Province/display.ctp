<?php
$this->Form->create($data);
if($province){
	echo $this->Form->input('provinceid',['label'=>"Province",'type'=>'select','options'=>$provinceData,'id'=>'provinceid']);
}
if($district){
	echo $this->Form->input('districtid',['label'=>"District",'type'=>'select','options'=>$districtData,'id'=>'districtid']);
}
if($ward){
	echo $this->Form->input('wardid',['label'=>"Ward",'type'=>'select','options'=>$wardData,'id'=>'wardid']);
}
?>
<?= $this->Html->script('/province/js/province') ?>   