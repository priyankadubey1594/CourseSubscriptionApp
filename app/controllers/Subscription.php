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
			$pageNumber = 1;
			$itemsPerPage = 3;
			if(isset($_GET['pageNumber']) && isset($_GET['itemsPerPage'])) {
				$pageNumber = $_GET['pageNumber'];
				$itemsPerPage = $_GET['itemsPerPage'];

			}
			$leftlimit = $itemsPerPage * ($pageNumber -1);
			$rightlimit = $itemsPerPage;
			$res = $this->subscriptionModel->report($leftlimit, $rightlimit);
			if(gettype($res) != 'array') {
				throw new Exception("Error Processing Request", 1);	
			}
			$result = array('message' => 'found','data'=>$res);
		} catch (Exception $e) {
			$result = array('message' => 'Error:'.$e->getMessage(),'data'=>$res);
		}
		return $this->view('subscription/subscription-report', $result);
	}

 // function to get total items
	public function getTotalItemCount () {
		try {
			
			$res = $this->subscriptionModel->getTotalItemCount();
			echo gettype($res);
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
				$students = $this->studentModel->getStudents();
				$courses = $this->courseModel->getCourses();
				if(gettype($students) == 'array' && gettype($courses) == 'array') {
					$result = array('message' => 'subscribed','students'=>$students, 'courses' => $courses);
				} else{
					throw new Exception("Error Processing Request", 1);
				}
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