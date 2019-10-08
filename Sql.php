<?php

class Sql extends PDO
{
	private $conn;

	public function __construct()
	{
		$this->conn = new PDO("mysql:dbname=PHP;host=localhost", "root", "Vivo941435994");
	}

	private function lancarBanco($do)
	{
		$stmt = $this->conn->prepare("$do");
		
		$stmt->execute();
	}
}

?>