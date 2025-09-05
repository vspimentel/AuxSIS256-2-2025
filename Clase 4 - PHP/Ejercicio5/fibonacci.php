<?php

$n = $_COOKIE["n"];

$fib = [0, 1];
$resultados = [$fib[0], $fib[1]];
for ($i = 2; $i < $n; $i++) {
    $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    $resultados[] = $fib[$i];
}

echo end($resultados);
