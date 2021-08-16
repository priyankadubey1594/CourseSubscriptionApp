<?php
class Student extends Controller{

	private $studentModel;
	public function __construct() {
		$this->studentModel = $this->model('StudentModel');
	}

	public function registrationForm() {
		return $this->view('student/student-registration');
	}
	
	public function updateForm() {
		if(isset($_GET['studentId'])) {
			$id = $_GET['studentId'];
			try {
				$res = $this->studentModel->getStudent($id);
				if($res == null || gettype($res) != 'array'){
					throw new Exception("Error Processing Request", 1);	
				}
				$result = array('message'=>'found', 'data' => $res);
				
			} catch (Exception $e) {
				$result = array('message'=>"Error:".$e->getMessage(), 'data' => $res);
			}

			return $this->view('student/update-student-details', $result);
		}
		$this->view('student/update-student-details');
	}

	public function register () {
		//echo "Student registered";
		if(isset($_POST)) {
			$res = $this->studentModel->register($_POST);
			$registered = null;
			$res = $this->studentModel->register($_POST);
				if($res  === true){
					$registered = "registered";
				} else {
					$registered = "not registered";
				}
				$result = array('message'=>$registered, 'data' => $res);	 
			return $this->view('student/student-registration', $result);
		}
		return $this->view('student/student-registration');
	}

	//function to get student list
	public function getStudents() {
		try {
			$res = $this->studentModel->getStudents();
			if(gettype($res) != 'array') {
				throw new Exception("Error Processing Request", 1);
			}
			$result = array('message'=>'found', 'data' => $res);
		} catch (Exception $e) {
			$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
		}
		return $this->view('student/student-list',$result);
	}

	//function to get student by id
	// public function getStudent($id) {
	// 	if(isset($_GET['studentId'])) {
	// 		$id = $_GET['studentId'];
	// 		$res = $this->studentModel->getStudent($id);
	// 		$result = array('message'=>'found', 'data' => $res);
	// 		return $this->view('student-list',$result);
	// 	}
	// }

	//function to delete a student 
	public function delete() {
		if(isset($_GET['studentId'])) {
			$id = $_GET['studentId'];
			try {
				$deleted = null;
				$res = $this->studentModel->deleteStudent($id);
				if($res === true){
					$deleted = 'deleted';
				} else{
					$deleted = 'not deleted';
				}
				$res = $this->studentModel->getStudents();
				if(gettype($res) != 'array') {
					echo "inside loop";
					throw new Exception("Error Processing Request", 1);	
				}
				$result = array('message'=>$deleted, 'data' => $res);
					
			} catch (Exception $e) {
				$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
			}
			return $this->view('student/student-list',$result);
		} 
		return $this->view('student/student-list');
	}

	//function to update student details
	public function update() {
		if(isset($_POST)) {
			try {
				$updated= null;
				$res = $this->studentModel->updateStudent($_POST);
				if($res === true){
					$updated = 'updated';
				} else {
					$updated = 'not updated';
				}
				$res = $this->studentModel->getStudents();
				if(gettype($res) != 'array') {
					throw new Exception("Error Processing Request", 1);		
				}
				$result = array('message'=>$updated, 'data' => $res);
			} catch (Exception $e) {
				$result = array('message'=>'Error:'.$e->getMessage, 'data' => $res);
			}
			return $this->view('student/student-list',$result);
		} 
		return $this->view('student/student-list');
	}
}
?>