<?php
$this->breadcrumbs=array(
	'States',
);

$this->menu=array(
	array('label'=>'Create States', 'url'=>array('create')),
	array('label'=>'Manage States', 'url'=>array('admin')),
);
?>

<h1>States</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
