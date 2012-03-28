<?php
	$data  = !empty($data) ? $data : array();
	echo json_encode(array(
		'data'=>$data
	));