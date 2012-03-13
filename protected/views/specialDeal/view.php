<?php
$this->breadcrumbs=array(
	'Special Deals'=>array('index'),
	$model->special_deal_id,
);

$this->menu=array(
	array('label'=>'List SpecialDeal', 'url'=>array('index')),
	array('label'=>'Create SpecialDeal', 'url'=>array('create')),
	array('label'=>'Update SpecialDeal', 'url'=>array('update', 'id'=>$model->special_deal_id)),
	array('label'=>'Delete SpecialDeal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->special_deal_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SpecialDeal', 'url'=>array('admin')),
);
?>

<h1>View SpecialDeal #<?php echo $model->special_deal_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'deal_id',
		'special_deal_id',
		'deal_date',
		'tee_time',
		'limit',
		'sold',
		'sold_out',
	),
)); ?>
