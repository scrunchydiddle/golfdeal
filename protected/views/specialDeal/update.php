<?php
$this->breadcrumbs=array(
	'Special Deals'=>array('index'),
	$model->special_deal_id=>array('view','id'=>$model->special_deal_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SpecialDeal', 'url'=>array('index')),
	array('label'=>'Create SpecialDeal', 'url'=>array('create')),
	array('label'=>'View SpecialDeal', 'url'=>array('view', 'id'=>$model->special_deal_id)),
	array('label'=>'Manage SpecialDeal', 'url'=>array('admin')),
);
?>

<h1>Update SpecialDeal <?php echo $model->special_deal_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>