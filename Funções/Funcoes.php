<?php

require_once "../Classe/Poupanca.php";
require_once "../Classe/Corrente.php";

function detalhes($conta)
{
	echo "<b>Informações de conta:</b><br><br>
			 Titular : ".$conta->titular."<br>
			 Agencia : ".$conta->agencia." | Conta : ".$conta->conta."<br>
			 Saldo : R$ ".$conta->getSaldo();
}

function depositar($conta, $valor)
{
	$conta->depositar($valor);

	echo "Deposito de R$ ".$valor." realizado com sucesso<br><br>
			  Saldo atual : R$ ".$conta->getSaldo()."<br><br>";
}

function sacarPOU($conta, $valor)
{
	if ($conta->sacar($valor) == true)
	{
		echo "Saque de R$ ".$valor." realizado com sucesso<br><br>
			  Saldo atual : R$ ".$conta->getSaldo()."<br><br>";
	}
	else
	{
		echo "Valor não permitido para saque..<br><br>
			  Valor tentado : R$ ".$valor."<br><br>
			  Saldo atual : R$ ".$conta->getSaldo()."<br><br>";
	}
}

function simular($conta, $when)
{

	if ($conta->simular($when) == false)
	{
		$temp =  strtotime("+ $when month");

		echo "Em " . date("d/m/Y", $temp) . " você terá R$ ".$conta->sim."<br><br>";
	}
	else
	{	
		echo "Saldo atual : R$ ".$conta->getSaldo()."<br><br>";
	}
}

function detalhesCOR($conta)
{
	echo "<b>Informações de conta:</b><br><br>
			 Titular : ".$conta->titular."<br>
			 Agencia : ".$conta->agencia." | Conta : ".$conta->conta."<br>
			 Saldo : R$ ".$conta->getSaldo()." | Crédito : R$ ".$conta->getCredito()."<br><br>";
}

function sacarCOR($conta, $valor)
{
	switch ($conta->sacar($valor)) {
		case 1:
			echo "Saque de R$ ".$valor." realizado com sucesso apenas com o saldo<br><br>
	 		  Saldo atual : R$ ".$conta->getSaldo()."<br>
	 		  Total de crédito atual : R$ ".$conta->getCredito()."<br><br>";
			break;
		
		case 2:
			echo "Saque de R$ ".$valor." realizado com sucesso<br><br>
	 		  Saldo atual : R$ ".$conta->getSaldo()."<br><br>
	 		  Total de crédito atual : R$ ".$conta->getCredito()."<br><br>";
			break;

		case 3:
			echo "Valor não permitido para saque..<br><br>
	 	 	  Valor tentado : R$ ".$valor."<br><br>
	 		  Saldo atual : R$ ".$conta->getSaldo()."<br><br>
	 		  Total de crédito atual : R$ ".$conta->getCredito()."<br><br>";
			break;
	}
}

?>