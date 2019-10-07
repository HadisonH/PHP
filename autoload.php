<?php

function __autoload($class)
{
	$dir = "../Classe/".$class.".php";

	if (file_exists($dir))
	{
		require_once $dir;
	}
}

?>