<?php

$tempo = date("D/M/Y H:i:s");
echo "$tempo";

echo "<br><br>";

echo date("d/m/y");

echo "<br><br>";


$nsc =  strtotime("2000-09-10");
echo date("l, d/m/Y", $nsc);

echo "<br><br>";

$t =  strtotime("+ 1 month");
echo date("l, d/m/Y", $t);

echo "<br><br>";


setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");

echo ucwords(strftime("%A %B"));

echo "<br><br>";


$dt = new DateTime();

$p = new DateInterval("P2W");

echo $dt->format("d/m/y");

echo "<br>";

$dt->add($p);

echo $dt->format("d/m/y");

echo "<br><br><br><br>";

echo date("d/m/y");
echo "<br>";

echo date("d/m/y", strtotime("+ 0 month"));



?>