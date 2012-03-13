<?php
$this->breadcrumbs=array(
	'Golf Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List GolfCourse', 'url'=>array('index')),
	array('label'=>'Create GolfCourse', 'url'=>array('create')),
	array('label'=>'Update GolfCourse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GolfCourse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GolfCourse', 'url'=>array('admin')),
);
?>

<h1>View GolfCourse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'state',
		'start_time',
		'end_time',
		'real_price',
		'description',
	),
)); ?>
