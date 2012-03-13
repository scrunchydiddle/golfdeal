<?php
$this->breadcrumbs=array(
	'Golf Courses',
);

$this->menu=array(
	array('label'=>'Create GolfCourse', 'url'=>array('create')),
	array('label'=>'Manage GolfCourse', 'url'=>array('admin')),
);
?>

<h1>Golf Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
