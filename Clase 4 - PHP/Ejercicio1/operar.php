<?php

require 'operaciones.php';

$n = $_GET["n"];
$cadena = $_GET["cadena"];
$a = $_GET["a"];
$b = $_GET["b"];
$c = $_GET["c"];

$operaciones = new Operaciones($n, $cadena, $a, $b, $c);

?>

<h2>Fibonacci</h2>
<p><?= implode(", ", $operaciones->calcularFibonacci()) ?></p>

<h2>Numero mayor</h2>
<p><?= $operaciones->calcularMayor() ?></p>

<h2>Pirámide</h2>
<?= $operaciones->piramide() ?>