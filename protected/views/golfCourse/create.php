<?php
$this->breadcrumbs=array(
	'Golf Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GolfCourse', 'url'=>array('index')),
	array('label'=>'Manage GolfCourse', 'url'=>array('admin')),
);
?>

<h1>Create GolfCourse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>