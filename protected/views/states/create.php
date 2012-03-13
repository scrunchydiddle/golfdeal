<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List States', 'url'=>array('index')),
	array('label'=>'Manage States', 'url'=>array('admin')),
);
?>

<h1>Create States</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>