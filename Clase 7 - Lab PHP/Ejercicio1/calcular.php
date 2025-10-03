<?php

$num = $_GET['num'];
$oculto = $_GET['oculto'];
echo $oculto . "<br>";
$digs = [];

for ($i = 0; $i < strlen($num); $i++) {
    array_push($digs, $num[$i]);
}

$sum = 0;

foreach ($digs as $dig) {
    $sum += $dig;
}

echo "La suma de los dígitos es: " . $sum;
