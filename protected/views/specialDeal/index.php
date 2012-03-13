<?php
$this->breadcrumbs=array(
	'Special Deals',
);

$this->menu=array(
	array('label'=>'Create SpecialDeal', 'url'=>array('create')),
	array('label'=>'Manage SpecialDeal', 'url'=>array('admin')),
);
?>

<h1>Special Deals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
