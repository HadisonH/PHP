<?php

$hier = [
	[
	"cargo" => "CEO",
		"sub" => [
			[
			"cargo" => "Diretor Comercial",
				"sub" => [
					[
					"cargo" => "Gerente de vendas"
					]
				]
			],

			[
			"cargo" => "Diretor Financeiro",
				"sub" => [
					[
					"cargo" => "Gerente de Contas a Pagar",
						"sub" => [
							[
							"cargo" => "Supervisor de Pagamentos"
							]
						]
					]
				]
			],

			[
			"cargo" => "Gerente de Compras",
				"sub" => [
					[
					"cargo" => "Supervisor de Suprimentos"
					]
				]
			]
		]
	]
];

function exibe($cargos) {
	$html = "<ul>";

	foreach ($cargos as $cargo) {
		$html .= "<li>";

		$html .= $cargo["cargo"];

		if (isset($cargo["cargo"]) && count($cargo["sub"]) > 0) {
			$html .= exibe($cargo["sub"]);
		}

		$html .= "</li>";
	}

	$html .= "</ul>";

	return $html;
}

echo exibe($hier);

echo "<pre>";
var_dump($hier);
echo "</pre>";



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