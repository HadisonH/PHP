<?php

function load($namespace)
{
	$caminho = __DIR__."/".$namespace.".php";

	return _once $caminho;
}

spl_autoload_register(__NAMESPACE__."\load");

?>