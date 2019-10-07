<?php

require_once "../autoload.php";

class Corrente extends Conta
{
	public $credito;

	public function __construct($agencia, $conta,int $senha, String $titular, $saldo, $credito)
	{
		parent::__construct($agencia, $conta, $senha, $titular, $saldo);
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
		
		if ($valor > $this->getSaldo() && $valor <= ($this->getSaldo() + $this->getCredito()))
		{
			$dif = $valor - $this->getSaldo();
			$this->setSaldo(0);
			$this->setCredito($this->getCredito() - $dif);

			return 2;
		}

		if ($valor > ($this->getSaldo() + $this->getCredito()))
		{
			return 3;
		}
	}
}

?>