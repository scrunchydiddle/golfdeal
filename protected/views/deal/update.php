<?php
$this->breadcrumbs=array(
	'Deals'=>array('index'),
	$model->deal_id=>array('view','id'=>$model->deal_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Deal', 'url'=>array('index')),
	array('label'=>'Create Deal', 'url'=>array('create')),
	array('label'=>'View Deal', 'url'=>array('view', 'id'=>$model->deal_id)),
	array('label'=>'Manage Deal', 'url'=>array('admin')),
);
?>

<h1>Update Deal <?php echo $model->deal_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>