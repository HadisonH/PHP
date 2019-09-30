<?php

$a = 55.0;
$b = 45;

if (($a <=> $b) == 1) {
	echo "Menor em<br>";
} else if ($a == $b) {
	echo "Iguaaaalll<br>";
} else {
	echo "Unico que sobra é ser maior<br>";
}

$referencia = $a <=> $b;

switch ($referencia) {
	case 1:
		echo "Menor em<br>";
		break;

	case 0:
		echo "Iguaaaalll<br>";
		break;

	case -1:
		echo "Unico que sobra é ser maior<br>";
		break;
}

echo "<br>";

for (null; $b <= $a; $b++) {
	echo("Aumentou mais um -- $b<br>");
}

echo "<br>";

echo "<select>";

for ($i = date("Y"); $i >= date("Y") - 18; $i--) {
	echo '<option value = "' . $i . '">' . $i . '</option>';
}

echo "</select>";

echo "<br><br>";

$meses = [
	"Janeiro",
	"Fevereiro",
	"Março",
	"Abril",
	"Maio",
	"Junho",
	"Julho",
	"Agosto",
	"Stembro",
	"Outubro",
	"Novembro",
	"Dezembro"
];

// echo "<pre>";
// var_dump($meses);
// echo "</pre>";

foreach ($meses as $i => $mes) {
	echo "Na posição $i<br>";
	echo "O mes é $mes<br><br>";
} //foreach apenas usado para lidar com arrays

?>

<form>
	<input type="text" name="Nome">
	<input type="date" name="Data-de-Nascimento">
	<input type="submit" value="OK">
</form>

<?php

if (isset($_GET)) {
	foreach ($_GET as $key => $value) {
		echo "$key<br>";
		echo "$value<br>";
		echo "<hr>";
	}
} else {
	echo "Vazio ..<br>";
}

$condicao = true;

while ($condicao) {
	$numero = rand(0, 10);

	if ($numero === 3) {
		echo "CHEGOU!!<br>";

		$condicao = false;
	}

	echo "$numero<br>";
} // faz apenas se atender a condição // o do while faz pelo menos umva vez e depois de novo apenas se atender a condição



?>