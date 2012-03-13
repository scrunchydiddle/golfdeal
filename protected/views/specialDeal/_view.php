<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_deal_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->special_deal_id), array('view', 'id'=>$data->special_deal_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_id')); ?>:</b>
	<?php echo CHtml::encode($data->deal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_date')); ?>:</b>
	<?php echo CHtml::encode($data->deal_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tee_time')); ?>:</b>
	<?php echo CHtml::encode($data->tee_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('limit')); ?>:</b>
	<?php echo CHtml::encode($data->limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sold')); ?>:</b>
	<?php echo CHtml::encode($data->sold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sold_out')); ?>:</b>
	<?php echo CHtml::encode($data->sold_out); ?>
	<br />


</div>