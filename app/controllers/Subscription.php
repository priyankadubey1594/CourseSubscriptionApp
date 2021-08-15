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

	public function report () {
			$res = $this->subscriptionModel->report();
			return $this->view('subscription/subscription-report', $res);
	}

	public function subscribe () {
		if(isset($_POST)){
			$res = $this->subscriptionModel->subscribe($_POST);
			$result = array('message'=>'subscribed', 'data' => $res);
			return $this->view('subscription/student-course-registration', $res);
		}	
	}

	public function getStudentsAndCourses() {
		$students = $this->studentModel->getStudents();
		$courses = $this->courseModel->getCourses();
		$result = array('message' => 'found','students'=>$students, 'courses' => $courses);
		return $this->view('subscription/student-course-registration', $result);
	}
}
?>