<?php

class Operaciones
{
    private $n;
    private $cadena;
    private $a;
    private $b;
    private $c;

    public function __construct($n, $cadena, $a, $b, $c)
    {
        $this->n = $n;
        $this->cadena = $cadena;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function calcularFibonacci()
    {
        $fib = [0, 1];
        $resultados = [$fib[0], $fib[1]];
        for ($i = 2; $i < $this->n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
            $resultados[] = $fib[$i];
        }
        return $resultados;
    }

    public function calcularMayor()
    {
        return max($this->a, $this->b, $this->c);
    }

    public function piramide()
    {
        $longitud = strlen($this->cadena);

        for ($i = 1; $i <= $longitud; $i++) {
            for ($j = 0; $j < $longitud - $i; $j++) {
                echo "&nbsp;";
            }
            echo substr($this->cadena, 0, $i);
            echo '<br>';
        }
    }
}
