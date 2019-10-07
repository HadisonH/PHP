<?php

require_once "../autoload.php";

class Corrente extends Conta
{
	public $credito;

	public function __construct($agencia, $conta,int $senha, String $titular, $saldo, $credito)
	{
		parent::__construct($agencia, $conta, $senha, $titular, $saldo);
		$this->setCredito($credito);

		$this->preencherBanco();
	}

	public function preencherBanco()
	{
		$agencia = $this->agencia;
		$conta = $this->conta;		
		$titular = $this->titular;
		$senha = $this->getSenha();
		$saldo = $this->getSaldo();

		$conn = new PDO("mysql:dbname=PHP;host=localhost", "root", "Vivo941435994");

		$stmt = $conn->prepare (
			"INSERT INTO tbCONTA (
				CONTA , AGENCIA, SENHA, TITULAR, SALDO, TIPO
			) VALUES (
				'$conta', '$agencia', '$senha', '$titular', '$saldo', 'Corrente'
			)"
		);

		$stmt->execute();
	}

	public function getCredito()
	{
		return $this->credito;
	}

	public function setCredito($credito)
	{
		$this->credito = $credito;
	}

	public function sacar($valor)
	{
		if ($valor <= $this->getSaldo())
		{
			$this->setSaldo($this->getSaldo() - $valor);

			$this->atualizarBanco();

			return 1;
		}
		
		if ($valor > $this->getSaldo() && $valor <= ($this->getSaldo() + $this->getCredito()))
		{
			$dif = $valor - $this->getSaldo();
			$this->setSaldo(0);
			$this->setCredito($this->getCredito() - $dif);

			$this->atualizarBanco();

			return 2;
		}

		if ($valor > ($this->getSaldo() + $this->getCredito()))
		{
			$this->atualizarBanco();
			
			return 3;
		}
	}
}

?>