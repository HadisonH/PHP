<?php

class Pessoa {
	public $nome = "Adison Rocha";
	protected $idade = 19; // própria classe e herdeiros veem
	private $senha = "012345"; // só a propria classe ve

	public function verDados() {
		echo $this->nome . "<br/>";
		echo $this->idade . "<br/>";
		echo $this->senha . "<br/>";
	}
}

class Programador extends Pessoa {
	// public function verDados() {
	// 	echo get_class($this) . "<br/>";
	// 	echo $this->nome . "<br/>";
	// 	echo $this->idade . "<br/>";
	// 	echo $this->senha . "<br/>";
	// }
}

$t = new Programador();

$t->verDados();

// echo "<br>";

// echo $t->nome;
// echo $t->idade;
// echo $t->senha;

// echo "<br>";

class Documento {
	private $numero;

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($n) {
		$this->numero = $n;
	}
}

class CPF extends Documento {
	public function validar():bool {
		$numeroCPF = $this->getNumero();

		return true;
	}
}

$doc = new CPF();

$doc->setNumero("46372746808");

echo "<pre>";
var_dump($doc->validar());
echo "<pre>";
echo "<br>";

echo $doc->getNumero();

?>