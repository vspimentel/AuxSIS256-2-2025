<?php

class Fibonacci
{
    public static function fibonacci(int $n): void
    {
        $fib = [0, 1];
        $resultados = [$fib[0], $fib[1]];
        for ($i = 2; $i < $n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
            $resultados[] = $fib[$i];
        }
        echo implode(', ', $resultados) . "<br>";
        echo "Fibonacci de $n: " . $resultados[$n - 1] . "<br>";
        // $sum = 0;
        // foreach ($resultados as $resultado) {
        //     $sum += $resultado;
        // }
        // array_map(fn($resultado) => $sum += $resultado, $resultados);
        echo "Suma total: " . array_sum($resultados);
    }
}

$n = $_GET["n"];

Fibonacci::fibonacci($n);
