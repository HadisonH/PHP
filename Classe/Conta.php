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
	}


	public function sacar($valor)
	{
		if ($valor <= $this->getSaldo())
		{
			$this->setSaldo($this->getSaldo() - $valor);

			return true;
		}
		else
		{
			return false;
		}
	}
}

?>