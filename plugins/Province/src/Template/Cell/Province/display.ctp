<?php
$this->Form->create($data);
if($province){
	echo '<div class="col-md-4">';
		echo $this->Form->input('provinceid',['label'=>"Province",'type'=>'select','options'=>$provinceData,'id'=>'provinceid']);
	echo '</div>';
}
if($district){
	echo '<div class="col-md-4">';
		echo $this->Form->input('districtid',['label'=>"District",'type'=>'select','options'=>$districtData,'id'=>'districtid']);
	echo '</div>';
}
if($ward){
	echo '<div class="col-md-4">';
		echo $this->Form->input('wardid',['label'=>"Ward",'type'=>'select','options'=>$wardData,'id'=>'wardid']);
	echo '</div>';
}
?>
<?= $this->Html->script('/province/js/province') ?>   