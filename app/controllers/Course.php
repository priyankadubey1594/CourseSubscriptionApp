<?php
class Course extends Controller{
	private $studentModel;
	public function __construct() {
		$this->CourseModel = $this->model('CourseModel');
	}

	public function addCourseForm() {
		return $this->view('course/add-course');
	}

	public function updateCourseForm() {
		if(isset($_GET['courseId'])) {
			$id = $_GET['courseId'];
			try {
				$res = $this->CourseModel->getCourse($id);
				if(gettype($res != 'array')) {
					throw new Exception("Error Processing Request", 1);
				}
				$result = array('message'=>'found', 'data' => $res);
			} catch (Exception $e) {
				$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
			}
			return $this->view('course/update-course-details', $result);
		}
		return $this->view('course/update-course-details');
	}

	public function addCourse () {
		//echo "Student registered";
		if(isset($_POST)) {
			
				$res = $this->CourseModel->addCourse($_POST);
				$added = null;
				if($res === true) {
					$added = 'added';
				} else {
					$added = 'not added';
				}
				$result = array('message'=>$added, 'data' => $res);
			return $this->view('course/add-course', $result);
		}
		return $this->view('course/add-course');
	}

	//function to get student list
	public function getCourses() {
		try {
			$res = $this->CourseModel->getCourses();
			if(gettype($res) != 'array') {
				throw new Exception("Error Processing Request", 1);
			}
			$result = array('message'=>'found', 'data' => $res);
		} catch (Exception $e) {
			$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
		}
		return $this->view('course/course-list',$result);
	}

	//function to delete a student 
	public function delete() {
		if(isset($_GET)) {
			$id = $_GET['courseId'];
			try {
				$deleted =  null;
				$res = $this->CourseModel->deleteCourse($id);
				if($res === true) {
					$deleted = 'deleted';
				} else {
					$deleted = 'not deleted';
				}
				$res = $this->CourseModel->getCourses();
				if(gettype($res) != 'array'){
					throw new Exception("Error Processing Request", 1);	
				}
				$result = array('message'=>$deleted, 'data' => $res);
			} catch (Exception $e) {
				$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
			}
			return $this->view('course/course-list',$result);
		}
		return $this->view('course/course-list');
	}

	//function to update student details
	public function update() {
		if(isset($_POST)) {
			try {
				$updated = null;
				$res = $this->CourseModel->updateCourse($_POST);
				if($res === true) {
					$updated = 'updated';
				} else {
					$updated = 'not updated';
				}
				$res = $this->CourseModel->getCourses();
				if(gettype($res) != 'array') {
					throw new Exception("Error Processing Request", 1);
				}
				$result = array('message'=>$updated, 'data' => $res);
			} catch (Exception $e) {
				$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
			}
			return $this->view('course/course-list',$result);
		}
		return $this->view('course/course-list');
	}
}
?>