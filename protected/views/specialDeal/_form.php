<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'special-deal-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'deal_id'); ?>
		<?php echo $form->textField($model,'deal_id'); ?>
		<?php echo $form->error($model,'deal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deal_date'); ?>
		<?php echo $form->textField($model,'deal_date'); ?>
		<?php echo $form->error($model,'deal_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tee_time'); ?>
		<?php echo $form->textField($model,'tee_time'); ?>
		<?php echo $form->error($model,'tee_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'limit'); ?>
		<?php echo $form->textField($model,'limit'); ?>
		<?php echo $form->error($model,'limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sold'); ?>
		<?php echo $form->textField($model,'sold'); ?>
		<?php echo $form->error($model,'sold'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sold_out'); ?>
		<?php echo $form->textField($model,'sold_out'); ?>
		<?php echo $form->error($model,'sold_out'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->