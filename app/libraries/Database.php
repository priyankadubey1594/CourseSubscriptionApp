<?php
/**
 * 
 */
class Database
{
	private $host = __HOST__;
	private $username = __USERNAME__;
	private $password = __PASSWORD__;
	private $dbName = __DATABASE__;

	private $statement;
	private $dbHandler;
	private $error;

	// function __construct(argument)
	// {
	// 	// code...
	// }

	public function __construct() 
	{
		$conn= "mysql:host=".$this->host.";dbname=".$this->dbName;

		$options= array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		try 
		{
			$this->dbHandler = new PDO($conn, $this->username, $this->password, $options);		
		} 
		catch (PDOException $e) 
		{
			$this->error = $e->getMessage();
			echo $this->error;
		}
		return $this->dbHandler;
	}

	public function getDb() {
       if ($this->dbHandler instanceof PDO) {
            return $this->dbHandler;
       }
 }
}

?>