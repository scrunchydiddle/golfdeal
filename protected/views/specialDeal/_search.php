<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'deal_id'); ?>
		<?php echo $form->textField($model,'deal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'special_deal_id'); ?>
		<?php echo $form->textField($model,'special_deal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deal_date'); ?>
		<?php echo $form->textField($model,'deal_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tee_time'); ?>
		<?php echo $form->textField($model,'tee_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'limit'); ?>
		<?php echo $form->textField($model,'limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sold'); ?>
		<?php echo $form->textField($model,'sold'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sold_out'); ?>
		<?php echo $form->textField($model,'sold_out'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->