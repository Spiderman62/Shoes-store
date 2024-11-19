<?php
// date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once "../connection/connect_database.php";
class Admin
{
	private $connect;
	public function __construct()
	{
		$db = new DatabaseConnection();
		$this->connect = $db->returnConnect();
	}
	public function getData($query = "SELECT * FROM users")
	{
        return $this->connect->query($query);
	}
	public function createUser()
	{
	}
	public function updateUser()
	{
	}
	public function deleteUser()
	{
	}
	public function _destruct()
	{
		$this->connect->close();
	}
}