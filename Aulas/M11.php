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
		?, ?
	)"
);

$stmt->bind_param ("ss", $CPF, $NOME);

$CPF = "46372746808";
$NOME = "Adison Rocha";

$CPF = "14328202812";
$NOME = "Ramia Rocha";

$res = $conn->query("SELECT * FROM tbCliente");

while ($row = $res->fetch_assoc()) {
	echo "<pre>";
	var_dump($row);
	echo "</pre>";
}

$stmt->execute();	

?>