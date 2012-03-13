<?php
$this->breadcrumbs=array(
	'Deals',
);

$this->menu=array(
	array('label'=>'Create Deal', 'url'=>array('create')),
	array('label'=>'Manage Deal', 'url'=>array('admin')),
);
?>

<h1>Deals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
