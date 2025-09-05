<?php
session_start();
$n = $_GET["n"];
$nums = $_GET["nums"];

$mult = 1;
foreach ($nums as $num) {
    $mult *= $num;
}
echo "El producto de los $n números es: $mult";
