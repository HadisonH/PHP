<?php

require_once "../Funções/Funcoes.php";

$adison = new Poupanca(2145, 01015406.8, 2108, "Adison Rocha", 2);

detalhes($adison);
echo "<br><br><br>";

depositar($adison, 3000);
echo "<br>";

sacarPOU($adison, 2500);
echo "<br>";

simular($adison, 12);
echo "<br>";

echo "Saldo atual : R$ ".$adison->getSaldo()."<br><br><br><br><br>";

//=====================================================================================================================\\

$ramia = new Corrente(1234, 01014573.0, 5174, "Ramia Rocha", 10000, 2000);

detalhesCOR($ramia);
echo "<br>";

depositar($ramia, 3000);
echo "<br>";

sacarCOR($ramia, 17000);
echo "<br><br>";

//=====================================================================================================================\\



?>