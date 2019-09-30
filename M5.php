<?php

$pessoas = array();

array_push($pessoas, array(
	"Nome" => "Adison",
	"Idade" => 22
));

array_push($pessoas, array(
	"Nome" => "Isabella",
	"Idade" => 21
));

array_push($pessoas, array(
	"Nome" => "Caik",
	"Idade" => 20
));

array_push($pessoas, array(
	"Nome" => "Eduardo",
	"Idade" => 19
));

echo $pessoas[0]["Nome"];
echo "<br>";
echo $pessoas[3]["Idade"];
echo "<br><br>";

$caracteristicas = [
	[
		"Nome" => "Adison",
		"Idade" => 20
	],
	[	
		"Nome" => "Caik",
		"Idade" => 19
	],
	[	
		"Nome" => "Eduardo",
		"Idade" => 18
	]
];

echo "Nome: " . $caracteristicas[0]["Nome"] . "<br>" . 
	 "Idade: " . $caracteristicas[0]["Idade"] . "<br><br>";

echo "Nome: " . $caracteristicas[1]["Nome"] . "<br>" . 
	 "Idade: " . $caracteristicas[1]["Idade"] . "<br><br>";

echo DIRECTORY_SEPARATOR;
?>