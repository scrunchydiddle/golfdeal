<?php $this->pageTitle=Yii::app()->name; ?>

<script>
dojo.provide("GD.Stash");
GD.Stash = <?php echo json_encode($stash); ?>;
dojo.require("GD.ManageContainer");

dojo.ready(function(){
	GD.ManageContainer.placeAt('wrapper');
	GD.ManageContainer.startup();
});
</script>
<div id="wrapper"></div>