<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->deal_id), array('view', 'id'=>$data->deal_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('golf_course_id')); ?>:</b>
	<?php echo CHtml::encode($data->golf_course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>