<?php
class SubscriptionModel {
	private $dbHandler;
	public function __construct() {
		$db = new Database();
		$this->dbHandler = $db->getDb();
	}

	//function to get student list
	public function report($leftLimit, $rightLimit) {
		try {
			$statement = $this->dbHandler->prepare("select s.firstName, s.lastName, c.courseName from  students s inner join subscriptions sb on s.id = sb.studentId inner join courses c on sb.courseId = c.id limit  :leftLimit, :rightLimit");
			$statement->bindValue(":leftLimit", $leftLimit, PDO::PARAM_INT);
        	$statement->bindValue(":rightLimit", $rightLimit, PDO::PARAM_INT);
			$statement->execute();
			$row = $statement->fetchAll();
			$count = $this->getTotalItemCount();
			return array('row' => $row, 'count' =>$count);
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			return 'Error: ' . $e->getMessage();
		}
	}
	
	//function to get student list
	public function getTotalItemCount() {
		try {
			$statement = $this->dbHandler->prepare("select s.firstName, s.lastName, c.courseName from  students s inner join subscriptions sb on s.id = sb.studentId inner join courses c on sb.courseId = c.id");
			
			$statement->execute();
			$rowCount = $statement->rowCount();
			return $rowCount;
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			return 'Error: ' . $e->getMessage();
		}
	}
	
	//function to subscribe a sstudent to a course
	public function subscribe($formData) {
		$studentId = (!empty($formData['studentId']) ? $formData['studentId'] : '');
		$courseId = (!empty($formData['courseId']) ? $formData['courseId'] : '');
		try {
			$statement = $this->dbHandler->prepare("insert into subscriptions (studentId, courseId, subscribedOn) values(:studentId, :courseId, now())");
			$statement->execute(array(':studentId' => $studentId, ':courseId' => $courseId));
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}
}
?>