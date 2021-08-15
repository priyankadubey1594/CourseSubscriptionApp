<?php
class Pages extends Controller{
	public function index() {
		return $this->view('index');
		//echo "welcome to index method";
	}
	public function about() {
		echo "About Page";
	}

	public function __construct() {
		//echo "Loaded";
	}
}
?>