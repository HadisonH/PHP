<?php

// $name = "Classe";

// if (!is_dir($name))
// {
// 	mkdir($name);

// 	echo "Arquivo $name criado com sucesso!";
// }
// else
// {
// 	rmdir($name);

// 	echo "JA TEEEMMMM O $name
// 		  mas agora foi removido, relaxa";
// }

$images = scandir("../Aulas");

$data = array();

foreach ($images as $img) {
	if (!in_array($img, array(".", "..")))
	{
		$filename = "../Aulas".DIRECTORY_SEPARATOR.$img;

		$info = pathinfo($filename);

		$info["size"] = filesize($filename);
		$info["modified"] = date("d/m/Y H:i:s", fileatime($filename));
		$info["url"] = "http://meusite.wj/PHP-Udemy/Aulas/".$filename;

		array_push($data, $info);
	}
}

echo json_encode($data);

?>