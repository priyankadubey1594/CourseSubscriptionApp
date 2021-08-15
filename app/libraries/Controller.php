<?php
class Controller {
	//load the model
	public function model($model) {
		require_once '../app/models/'. $model. '.php';
		return new $model();
	}

	//check and load the view
	public function view($view, $data=[]) {
		//echo '../app/views/'. $view. '.php';
		if(file_exists('../app/views/'. $view. '.php')) {
			require_once '../app/views/'. $view. '.php';
		} else {
			die ('View could not be found');
		}
	}
}
?>