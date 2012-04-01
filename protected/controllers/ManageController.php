<?php

class ManageController extends Controller
{
	public $layout='//layouts/main';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'actions'=>array('index'),
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex(){
		$getAttr = function($row){ return $row->attributes; }; 	

		$this->render('index',array(
			'stash' => array(
				'courses' => array_map($getAttr,GolfCourse::model()->findAll()),
				'states' => array_map($getAttr,States::model()->findAll())
			)
		));
	}
	
}