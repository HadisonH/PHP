<?php

require_once "../autoload.php";

class Poupanca extends Conta
{
	public $dtAtual;

	public function __construct($agencia, $conta,int $senha, String $titular, $saldo)
	{
		parent::__construct($agencia, $conta, $senha, $titular, $saldo);

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
				'$conta', '$agencia', '$senha', '$titular', '$saldo', 'Poupanca'
			)"
		);

		$stmt->execute();
	}

	public function simular(int $dtAtual)
	{
		$temp =  strtotime("+ $dtAtual month");

		if (date("d/m/Y") == date("d/m/Y", $temp))
		{	
			return true;
		}
		else
		{
			$tax = 0.005;

			$this->sim = $this->getSaldo();

			for ($i = 0; $i < $dtAtual; $i++)
			{

				$this->sim *= ((1 + $tax) ** 1);
			}

			return false;
		}
	}
}

?>