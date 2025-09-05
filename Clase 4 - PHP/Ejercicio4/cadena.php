<?php

include "utiles.php";

$cadena = $_GET["cadena"];
$guiones = $_GET["guiones"];

$utiles = new Utiles($cadena);

echo $utiles->aumentarGuiones($guiones);
