<?php

spl_autoload_register(function($nomeClasse) {
	$dirClass = "Classe";
	$file = $dirClass . DIRECTORY_SEPARATOR . $nomeClasse . ".php";

	if (file_exists($file) === true) {
		require_once($file);
	}
});

class DelRey extends \Automovel {
	public function empurrar() {
		echo "Empurrou!";
	}

	public function poli () {
		return "Teste de polimorfixmo né ." . "<br>" . parent::poli();
	}
}

$car = new \Automovel();

$car->acelerar(20);

echo "<br>";

$c = new DelRey();

$c->empurrar();

echo "<br>";

echo $c->poli() . "<br>";

?>