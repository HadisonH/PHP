<?php

abstract class Conta
{
	public $agencia;
	public $conta;
	public $titular;
	protected $saldo;

	public $sim;

	public function __construct($agencia, $conta, String $titular, $saldo)
	{
		$this->agencia = $agencia;
		$this->conta = $conta;		
		$this->titular = $titular;
		$this->setSaldo($saldo);
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