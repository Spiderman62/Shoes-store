<?php
class DatabaseConnection
{
	private $host = "localhost";
	private $username = "root";
	private $password = "aztenderio7146";
	private $database = "my_workspace";
	private $connection;
	public function __construct()
	{
		$this->connect();
	}
	private function connect()
	{
		$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
		if ($this->connection->connect_error) {
			die("Connection failed: " . $this->connection->connect_error);
		}
	}
	public function returnConnect(){
		return $this->connection;
	}
}
