<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'deal-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'golf_course_id'); ?>
        <?php echo $form->dropDownList(
                        $model,'golf_course_id',
                        CHtml::listData(GolfCourse::model()->findAll(), 'id', 'name'),
                        array('empty' =>'Select Course')
                    ); 
        ?>
		<?php echo $form->error($model,'golf_course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
