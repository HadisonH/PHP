<?php

function __autoload($class)
{
	if (file_exists("../Classe/".$class.".php"))
	{
		require_once "../Classe/".$class.".php";
	}
}

?>