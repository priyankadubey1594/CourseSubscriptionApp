<?php
class Subscription extends Controller{
	private $subscriptionModel;
	private $studentModel;
	private $courseModel;
	public function __construct() {
		$this->subscriptionModel = $this->model('SubscriptionModel');
		$this->studentModel = $this->model('StudentModel');
		$this->courseModel = $this->model('CourseModel');
	}

	//method to get report
	public function report () {
		try {
			$res = $this->subscriptionModel->report();
			if(gettype($res) != 'array') {
				throw new Exception("Error Processing Request", 1);	
			}
			$result = array('message' => 'found','data'=>$res);
		} catch (Exception $e) {
			$result = array('message' => 'Error:'.$e->getMessage(),'data'=>$res);
		}
		return $this->view('subscription/subscription-report', $result);
	}

	//method to subscribe a student to a course
	public function subscribe () {
		if(isset($_POST)){
			try {
				$res = $this->subscriptionModel->subscribe($_POST);
				if($res != true) {
					throw new Exception("Error Processing Request", 1);
				}
				$result = array('message'=>'subscribed', 'data' => $res);
			} catch (Exception $e) {
				$result = array('message'=>'Error:'.$e->getMessage(), 'data' => $res);
			}
			return $this->view('subscription/student-course-registration', $result);
		}
		return $this->view('subscription/student-course-registration');
	}

	//method which returns the list of students and the lsit of courses
	public function getStudentsAndCourses() {
		try {
			$students = $this->studentModel->getStudents();
			$courses = $this->courseModel->getCourses();
			if(gettype($students) != 'array' || gettype($courses) != 'array') {
				throw new Exception("Error Processing Request", 1);
			}
			$result = array('message' => 'found','students'=>$students, 'courses' => $courses);
		} catch (Exception $e) {
			$result = array('message' => 'Error:'.$e->getMessage(),'students'=>$students, 'courses' => $courses);
		}
		return $this->view('subscription/student-course-registration', $result);
	}
}
?>