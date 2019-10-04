<?php

abstract class Conta
{
	public $agencia;
	private $conta;
	protected $titular;
	protected $saldo;


	public function __construct($agencia, $conta, String $titular, $saldo)
	{
		$this->agencia = $agencia;
		$this->conta = $conta;
		$this->saldo = $saldo;
		$this->titular = $titular;
	}

	public function detalhes()
	{
		echo "<b>Informações de conta:</b><br><br>
			 Titular : ".$this->titular."<br>
			 Agencia : ".$this->agencia." | Conta : ".$this->conta."<br>
			 Saldo : R$ ".$this->saldo;
	}

	public function depositar($valor)
	{
		$this->saldo += $valor;
		echo "Deposito realizado no valor de R$ $valor<br><br>
			  Saldo atual : R$ $this->saldo<br><br>";
	}

	public function sacar($valor)
	{
		if ($valor < $this->saldo)
		{
			$this->saldo -= $valor;

			echo "Saque de R$ $valor realizado com sucesso<br><br>
				  Saldo atual : R$ $this->saldo<br><br>";
		}
		else
		{
			echo "Valor não permitido para saque..<br><br>
				  Valor tentado : R$ $valor<br><br>
				  Saldo atual : R$ $this->saldo<br><br>";
		}
	}
}

//=====================================================================================================================\\

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
			echo "Saldo atual : R$ $this->saldo<br><br>";
		}
		else
		{
			for ($i = 0; $i < $this->dtAtual; $i++)
			{
				$this->saldo += $this->saldo * 0.005 * $this->dtAtual;
			}
			
			echo "Em " . date("d/m/Y", $temp) . " você terá R$ $this->saldo<br><br>";
		}
	}
}

//=====================================================================================================================\\

class Corrente extends Conta
{
	public $credito;

	public function __construct($agencia, $conta, String $titular, $saldo, $credito)
	{
		parent::__construct($agencia, $conta, $titular, $saldo);
		$this->credito = $credito;
	}

	public function detalhes()
	{
		echo parent::detalhes()." | Crédito : R$ $this->credito<br><br>";
	}

	public function sacar($valor)
	{
		if ($valor < $this->saldo)
		{
			$this->saldo -= $valor;

			echo "Saque de R$ $valor realizado com sucesso apenas com o saldo<br><br>
				  Saldo atual : R$ $this->saldo<br><br>";
		}
		else if ($valor <= ($this->saldo + $this->credito))
		{
			$dif = $valor - $this->saldo;
			$this->saldo = 0;
			$this->credito -= $dif;

			echo "Saque de R$ $valor realizado com sucesso<br><br>
				  Saldo atual : R$ $this->saldo<br><br>
				  Total de crédito atual : R$ $this->credito<br><br>";
		}
		else
		{
			echo "Valor não permitido para saque..<br><br>
				  Valor tentado : R$ $valor<br><br>
				  Saldo atual em conta : R$ $this->saldo<br>
				  Total de crédito atual : R$ $this->credito<br><br>";
		}
	}
}

//=====================================================================================================================\\

$adison = new Poupanca(2145, 01015406.8, "Adison Rocha", 350.00);

$adison->detalhes();
echo "<br><br><br><br>";

$adison->depositar(1500);
echo "<br><br>";

$adison->sacar(3000.00);
echo "<br><br>";

$adison->simular(1);
echo "<br><br>";

$adison->sacar(500.00);
echo "<br><br>";

//=====================================================================================================================\\

$ramia = new Corrente("0807", 01011234.0, "Ramia Rocha", 2000, 1500);

$ramia->detalhes();
echo "<br><br>";

$ramia->sacar(1500.00);

?>