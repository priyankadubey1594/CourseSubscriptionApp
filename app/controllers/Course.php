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
			$res = $this->CourseModel->getCourse($id);
			$result = array('message'=>'found', 'data' => $res);
			return $this->view('course/update-course-details', $result);
		}
	}

	public function addCourse () {
		//echo "Student registered";
		if(isset($_POST)) {
			$res = $this->CourseModel->addCourse($_POST);
			return $this->view('course/add-course', $res);
		}
	}

	//function to get student list
	public function getCourses() {
		$res = $this->CourseModel->getCourses();
		$result = array('message'=>'found', 'data' => $res);
		return $this->view('course/course-list',$result);
	}

	//function to delete a student 
	public function delete() {
		if(isset($_GET)) {
			$id = $_GET['courseId'];
			$this->CourseModel->deleteCourse($id);
			$res = $this->CourseModel->getCourses();
			$result = array('message'=>'deleted', 'data' => $res);
			return $this->view('course/course-list',$result);
		}
		
	}

	//function to update student details
	public function update() {
		if(isset($_POST)) {
			$this->CourseModel->updateCourse($_POST);
			$res = $this->CourseModel->getCourses();
			$result = array('message'=>'updated', 'data' => $res);
			return $this->view('course/course-list',$result);
		}
		
	}
}
?>