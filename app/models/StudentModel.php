<?php
class StudentModel {
	private $dbHandler;
	public function __construct() {
		$db = new Database();
		$this->dbHandler = $db->getDb();
	}

	//function to regiter the student
	public function register ($formData) {
		$firstName = (!empty($formData['firstName']) ? $formData['firstName'] : '');
		$lastName = (!empty($formData['lastName']) ? $formData['lastName'] : '');
		$dob = (!empty($formData['dob']) ? $formData['dob'] : '');
		$contact = (!empty($formData['contact']) ? $formData['contact'] : 0);

		try {
			// Set SQL
			$sql = 'INSERT INTO students (firstName, lastName, dob, contact, createdOn) VALUES (:firstName, :lastName, :dob, :contact, NOW())';

			// Prepare query
			$statement = $this->dbHandler->prepare($sql);
			$statement->bindValue(":firstName", $firstName, PDO::PARAM_STR);
			$statement->bindValue(":lastName", $lastName, PDO::PARAM_STR);
			$statement->bindValue(":dob", $dob, PDO::PARAM_STR);
			$statement->bindValue(":contact", $contact, PDO::PARAM_INT);
			// Execute query
			$statement->execute();
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	//function to get student list
	public function getStudents() {
		try {
			$statement = $this->dbHandler->prepare("select id, firstName, lastName, contact, dob from students");
			$statement->execute();
			$row = $statement->fetchAll();
			return $row;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}

	}

	//function to get a student by id
	public function getStudent($id) {
		try {
			$statement = $this->dbHandler->prepare("select id, firstName, lastName, dob, contact from students where id = :id");
			$statement->bindValue(":id", $id, PDO::PARAM_INT);
			$statement->execute();
			$row = $statement->fetchAll();
			//print_r($row);
			return $row;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}

	}

	//function to delete a  student 
	public function deleteStudent($id) {
		try {
			$statement = $this->dbHandler->prepare("delete from students where id = :id");
			$statement->bindValue(":id", $id, PDO::PARAM_INT);
			$statement->execute();
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
	}

	//function to update a  student details
	public function updateStudent($formData) {
		$id = (!empty($formData['studentId']) ? $formData['studentId'] : '');
		$firstName = (!empty($formData['firstName']) ? $formData['firstName'] : '');
		$lastName = (!empty($formData['lastName']) ? $formData['lastName'] : '');
		$dob = (!empty($formData['dob']) ? $formData['dob'] : '');
		$contact = (!empty($formData['contact']) ? $formData['contact'] : 0);
		try {
			$sql = "update students set  firstName = :firstName, lastName = :lastName,  dob = :dob, contact = :contact where id= :id";
			$statement = $this->dbHandler->prepare($sql);
			$statement->bindValue(":firstName", $firstName, PDO::PARAM_STR);
			$statement->bindValue(":lastName", $lastName, PDO::PARAM_STR);
			$statement->bindValue(":dob", $dob, PDO::PARAM_STR);
			$statement->bindValue(":contact", $contact, PDO::PARAM_INT);
			$statement->bindValue(":id", $id, PDO::PARAM_INT);
			// Execute query
			$statement->execute();
			return true;
		} catch (PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}

	}
}
?>