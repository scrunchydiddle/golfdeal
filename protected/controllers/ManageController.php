<?php

class ManageController extends Controller
{
	public function actionIndex(){
		$this->renderPartial('/service/json',array(
			'1' => array(
				'one' => 'two'
			)
		));
		$goulf_courses = GolfCourse::model()->findAll();
		$course_stash = array();
		foreach($goulf_courses as $gc){
			array_push($course_stash,$gc->attributes);
		}
		$this->render('index',array(
			'stash' => array(
				'states' => $course_stash
			)
		));
	}
	
	
}