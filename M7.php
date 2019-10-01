<?php

$pessoas = [
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
	],
	[	
		"Nome" => "Isabella",
		"Idade" => 17
	]
];

for ($i = 0; $i < count($pessoas); $i++) {
	foreach ($pessoas[$i] as &$value) { // usar o & referencia a variavel, assim altera diretamente ela
	
	if (gettype($value) === 'integer') $value += 10;

	echo "$value <br>";
	}
	echo "<br>";
}

echo "<pre>";
print_r($pessoas);
echo "<pre>";

function soma(float ...$n):int {
	return array_sum($n);
}
// ...$(variavel) serve para pegar todos os valores passados
//:(tipo) diz o tipo do retorno

echo soma(0.4, 1.1, 2.9, 3.3, 4.8);
echo "<br>";

function test($callback){
	$callback();
}

test(function() {
	echo "Entendi muito bem não";
} );


$a = function($b, $c) {
	$a = $b + $c;
	echo "$a";
};

echo "<br>";

$a(5,5);

echo "<br>";

echo $a(5,9);

?>