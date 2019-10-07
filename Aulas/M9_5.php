<?php

function __autoload($class)
{
	if (file_exists("../Classe/".$class.".php"))
	{
		require_once "../Classe/".$class.".php";
	}
}

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

echo $car->poli() . "<br>";

echo "<br>";

$c = new DelRey();

$c->empurrar();

echo "<br>";

echo $c->poli() . "<br>";

?>