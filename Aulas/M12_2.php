<?php

$conn = new PDO("mysql:dbname=PHP;host=localhost", "root", "Vivo941435994");

$stmt = $conn->prepare(
	"CREATE TABLE tbCONTA (
		CONTA VARCHAR(11) PRIMARY KEY,
		AGENCIA VARCHAR(100),
		SENHA INT,
		TITULAR VARCHAR(100),
		SALDO INT
	)"
);

$stmt->execute();

?>