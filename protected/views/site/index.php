<?php $this->pageTitle=Yii::app()->name; ?>

<div id="search" class="green radius box span-22 prepend-top">
<?php 
    echo CHtml::beginform(array('/site/listing'),'get');
?>
<h1 class="font-green"><b><i>Find golf course</i></b></h1>
<label class="large span-22">
States
<?php
    $stateList = CHtml::listData(States::model()->findAll(), 'id', 'name');
    echo CHtml::listBox('state','',$stateList,array('class'=>'span-22'));
?>
</label>
<div class="span-22">
<?php
    echo CHtml::submitButton('Submit', array( 'name' => 'action'));
    echo CHtml::endForm();
?>
</div>
</div>
