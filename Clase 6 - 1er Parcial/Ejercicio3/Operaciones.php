<?php

class Operaciones
{
    private $a;
    private $b;
    private $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    function sumar()
    {
        $resultado = $this->a + $this->b + $this->c;
        echo "El resultado de la suma de $this->a + $this->b + $this->c es: $resultado";
    }

    function restar()
    {
        $resultado = $this->a - $this->b - $this->c;
        echo "El resultado de la resta de $this->a - $this->b - $this->c es: $resultado";
    }

    function multiplicar()
    {
        $resultado = $this->a * $this->b * $this->c;
        echo "El resultado de la multiplicación de $this->a * $this->b * $this->c es: $resultado";
    }

    function division()
    {
        $resultado = $this->a / $this->b / $this->c;
        echo "El resultado de la división de $this->a / $this->b / $this->c es: $resultado";
    }
}
