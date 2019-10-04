<?php

abstract class Conta
{
	public $agencia;
	public $conta;
	public $titular;
	protected $saldo;

	global $final;

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

class Poupanca extends Conta
{
	public $dtAtual;

	public function __construct($agencia, $conta, String $titular, $saldo)
	{
		parent::__construct($agencia, $conta, $titular, $saldo);
	}

	public function simular(int $dtAtual)
	{
		$this->dtAtual = $dtAtual;

		$temp =  strtotime("+ $dtAtual month");

		if (date("d/m/Y") == date("d/m/Y", $temp))
		{
			return true;
		}
		else
		{
			$ref = $this->saldo;

			for ($i = 0; $i < $this->dtAtual; $i++)
			{
				$this->saldo += $this->saldo * 0.005 * $this->dtAtual;
			}
			
			$final = $this->saldo;
			$this->saldo = $ref;

			return $this->$final;
		}
	}
}

class Corrente extends Conta
{
	public $credito;

	public function __construct($agencia, $conta, String $titular, $saldo, $credito)
	{
		parent::__construct($agencia, $conta, $titular, $saldo);
		$this->setCredito($credito);
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

			return 1;
		}
		else if ($valor <= ($this->getSaldo() + $this->getCredito()))
		{
			$dif = $valor - $this->getSaldo();
			$this->setSaldo(0);
			$this->setCredito($this->getCredito() - $dif);

			return 2;
		}
		else if ($valor > $this->getSaldo())
		{
			return 3;
		}
	}
}

?>