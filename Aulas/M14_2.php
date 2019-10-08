<?php

$file = fopen("test.txt", "w+");

fwrite($file, "AAAAAAAHHHHHH<br>".date("d/m/Y H:i:s"));

fclose($file);

echo "CRIOUU";

unlink("test.txt");

echo "REMOVEU";

?>