<?php
class CourseModel {
	private $dbHandler;
	public function __construct() {
		$db = new Database();
		$this->dbHandler = $db->getDb();
	}

	public function addCourse ($formData) {	
		$courseName = (!empty($formData['courseName']) ? $formData['courseName'] : '');
		$courseDetails = (!empty($formData['courseDetails']) ? $formData['courseDetails'] : '');
		try {
			// Set SQL
			$sql = 'INSERT INTO courses (courseName, courseDetails, createdOn) VALUES (:courseName, :courseDetails, NOW())';
			// Prepare query
			$statement = $this->dbHandler->prepare($sql);
			// Execute query
			$statement->execute(array(':courseName' => $courseName, ':courseDetails' => $courseDetails));
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	//function to get student list
	public function getCourses() {
		try {
			$statement = $this->dbHandler->prepare("select id, courseName, courseDetails from courses");
			$statement->execute();
			$row = $statement->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}

	}

	//function to get student list
	public function getCourse($id) {
		try {
			$statement = $this->dbHandler->prepare("select id, courseName, courseDetails from courses where id = :id");
			$statement->execute(array(':id' => $id));
			$row = $statement->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}

	}

	//function to delete a  student 
	public function deleteCourse($id) {
		try {
			$statement = $this->dbHandler->prepare("delete from courses where id = :id");
			$statement->execute(array(':id' => $id));
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	//function to update a  student details
	public function updateCourse($formData) {
		$id = (!empty($formData['courseId']) ? $formData['courseId'] : '');
		$courseName = (!empty($formData['courseName']) ? $formData['courseName'] : '');
		$courseDetails = (!empty($formData['courseDetails']) ? $formData['courseDetails'] : '');
		try {
			$statement = $this->dbHandler->prepare("update courses set  courseName = :courseName, courseDetails = :courseDetails where id= :id");
			$statement->execute(array(':courseName' => $courseName, ':courseDetails' => $courseDetails, ':id' => $id));
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}

	}
}
?>