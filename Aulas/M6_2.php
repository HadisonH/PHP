<?php

session_start();

echo $_SESSION["nome"]."<br><br>";

echo "Meu ID de Sessão é :".session_id();

session_regenerate_id();

echo "Meu ID de Sessão é :".session_id();

?>