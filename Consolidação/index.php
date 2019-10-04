<?php

require "funcoes.php";

$adison = new Poupanca(2145, 01015406, "Adison Rocha", 5000);

detalhes($adison);
echo "<br><br><br>";

depositar($adison, 3000);
echo "<br>";

sacarPOU($adison, 2500);
echo "<br><br>";

simular($adison, 12);
echo "<br><br>";

//=====================================================================================================================\\

// $ramia = new Corrente(1234, 01014573.0, "Ramia Rocha", 10000, 2000);

// detalhesCOR($ramia);
// echo "<br><br><br>";

// // depositar($ramia, 3000);
// // echo "<br>";

// sacarCOR($ramia, 11000);
// echo "<br><br>";

?>