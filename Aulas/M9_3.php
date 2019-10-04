<?php

class Endereco {
	private $logradouro;
	private $numero;
	private $cidade;

	public function __construct($a, $b, $c) {
		$this->logradouro = $a;
		$this->numero = $b;
		$this->cidade = $c;
	}

	public function __destruct() {
		var_dump("DESTRUIUU");
	}

	public function __toString() {
		return $this->logradouro . ", " . $this->numero . " - " . $this->cidade;
	}
}

$meuEndereco = new Endereco("Via das Acácias", "617", "Embu das Artes");

echo "<pre>";
var_dump($meuEndereco);
echo "<br>";
echo $meuEndereco;
echo "<br>";
unset($meuEndereco);
echo "</pre>";

?>