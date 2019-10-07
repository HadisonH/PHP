<?php

session_start();

session_regenerate_id();

echo "Meu ID de Sessão é :".session_id()."<br><br>";

echo "Meu ID de Sessão esta sendo salvo em :".session_save_path()."<br><br>";

session_destroy();

echo "Meu ID de Sessão é :".session_id()."<br><br>";

?>