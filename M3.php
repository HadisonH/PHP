<?php

include "Funções/Matematicas.php";

$ip = $_SERVER["REMOTE_ADDR"];
$local = $_SERVER["SCRIPT_NAME"];

echo "$local<br>";
echo "$ip<br><br>";

//////////////////////////////////////////////

$nome = strtoupper("Adison<br>"); // strtoupper() deixa todas as letras maisculas

function t_global() {
	global $nome; // global consegue pegar a variavel que esta fora
	echo $nome;
}

function normal() {
	$nome = "isabella";
	echo ucwords("$nome<br><br>"); // ucword() deixa a primeira letra maiuscula // ucfirst() deixa a primeira letra de todas as palavras maiuscula
}

t_global();

normal();

//////////////////////////////////////////////

$z = null;
$x = null;
$a = 55.0;
$b = 500;

var_dump($a == $b); // "==" compara valor
echo "<br>";

var_dump($a === $b); // " === " compara o valor e o tipo -> mesmo com " !== "
echo "<br>";

var_dump($a <=> $b); // < } 1 // = } 0 // > } -1
echo "<br>";

echo $z ?? $x ?? $a ?? $b; // se z for null faz x, se x for null faz a...
echo "<br><br>";

//////////////////////////////////////////////

$r = (5 + 5) / 3 > 3 && 10 * 3 < 33;
var_dump($r);
echo "<br><br>";

//////////////////////////////////////////////

$palavra = "EU";

$palavra = str_replace("E", "3", $palavra); // troca as letras
echo "$palavra<br>";

$frase = "É isso que temos ai pra testar emm";

$p = "pra";

$q = strpos($frase, $p); // pegar a palavra da prase

$texto = substr($frase, 0, $q); // pegar tudo o que esta antes da palavra
var_dump($texto);
echo "<br>";

$texto2 = substr($frase, $q + strlen($p), strlen($frase)); // pegar tudo o que esta depois da palavra // strlen() pega o número de letras da palavra
var_dump($texto2);
echo "<br><br>";

//////////////////////////////////////////////

$resultado = somar(5, 5);
echo $resultado;
?>