<?php
$this->breadcrumbs=array(
	'Special Deals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SpecialDeal', 'url'=>array('index')),
	array('label'=>'Manage SpecialDeal', 'url'=>array('admin')),
);
?>

<h1>Create SpecialDeal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>