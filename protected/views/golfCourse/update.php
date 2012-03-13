<?php
$this->breadcrumbs=array(
	'Golf Courses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GolfCourse', 'url'=>array('index')),
	array('label'=>'Create GolfCourse', 'url'=>array('create')),
	array('label'=>'View GolfCourse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GolfCourse', 'url'=>array('admin')),
);
?>

<h1>Update GolfCourse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>