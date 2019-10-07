<?php

$conn = new PDO("mysql:dbname=PHP;host=localhost", "root", "Vivo941435994");

$stmt = $conn->prepare(
	"CREATE TABLE tbCliente (
		CPF VARCHAR(11) PRIMARY KEY,
		NOME VARCHAR(100)
	)"
);

$stmt = $conn->prepare (
	"INSERT INTO tbCliente (
		CPF , NOME
	) VALUES (
		'46372746808', 'Adison Rocha'
	)"
);

$stmt = $conn->prepare("SELECT * FROM tbCliente");

$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($res as $row) {
	foreach ($row as $key => $value) {
		echo "<strong>$key:</strong>$value<br/>";
	}
	echo "========================================<br>";
}

?>