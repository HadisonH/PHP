<?php

spl_autoload_register(function($nomeClasse) {
	if (file_exists("Classe" . DIRECTORY_SEPARATOR . $nomeClasse . ".php") === true) {
		require_once("Classe" . DIRECTORY_SEPARATOR . $nomeClasse . ".php");
	}
});

class DelRey extends Automovel {
	public function empurrar() {
		echo "Empurrou!";
	}

	public function poli () {
		return "Teste de polimorfixmo né ." . "<br>" . parent::poli();
	}
}

$car = new Automovel();

$car->acelerar(20);

echo "<br>";

$c = new DelRey();

$c->empurrar();

echo "<br>";

echo $c->poli() . "<br>";

?>