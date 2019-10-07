<?php

abstract class Conta
{
	public $agencia;
	public $conta;
	public $titular;
	protected $senha;
	protected $saldo;

	public $sim;

	public function __construct($agencia, $conta,int $senha, String $titular, $saldo)
	{
		$this->agencia = $agencia;
		$this->conta = $conta;		
		$this->titular = $titular;
		$this->setSenha($senha);
		$this->setSaldo($saldo);

		$this->criarBanco();
	}


	public function criarBanco()
	{
		$conn = new PDO("mysql:dbname=PHP;host=localhost", "root", "Vivo941435994");

		$stmt = $conn->prepare(
			"CREATE TABLE tbCONTA (
				CONTA VARCHAR(11) PRIMARY KEY,
				AGENCIA VARCHAR(100),
				SENHA INT,
				TITULAR VARCHAR(100),
				SALDO INT,
				TIPO VARCHAR(100)
			)"
		);

		$stmt->execute();
	}

	public function atualizarBanco()
	{
		$conta = $this->conta;
		$saldo = $this->getSaldo();

		$conn = new PDO("mysql:dbname=PHP;host=localhost", "root", "Vivo941435994");

		$stmt = $conn->prepare("UPDATE tbCONTA SET SALDO = '$saldo'
								WHERE CONTA = '$conta'");

		$stmt->execute();
	}

	public function getSenha()
	{
		return $this->senha;
	}

	public function setSenha($senha)
	{
		$this->senha = $senha;
	}

	public function getSaldo()
	{
		return $this->saldo;
	}

	public function setSaldo($saldo)
	{
		$this->saldo = $saldo;
	}


	public function depositar($valor)
	{
		$this->setSaldo($this->getSaldo() + $valor);

		$this->atualizarBanco();
	}


	public function sacar($valor)
	{
		if ($valor <= $this->getSaldo())
		{
			$this->setSaldo($this->getSaldo() - $valor);

			$this->atualizarBanco();

			return true;
		}
		else
		{
			$this->atualizarBanco();
			
			return false;
		}
	}
}

?>