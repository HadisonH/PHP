<?php

$conn = new mysqli("localhost", "root", "Vivo941435994", "PHP");

if ($conn->connect_error) {
	echo "Error: " . $conn->connect_error;
}

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

$stmt = $conn->prepare (
	"INSERT INTO tbCliente (
		CPF , NOME
	) VALUES (
		'12345678901', 'Isabella Vero'
	)"
);

$stmt->execute();	

?>