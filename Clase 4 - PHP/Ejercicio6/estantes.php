<?php

class Estantes
{
    private array $estante1;
    private array $estante2;
    private array $estante3;
    private int $tope1;
    private int $tope2;
    private int $tope3;

    public function __construct()
    {
        $this->estante1 = [];
        $this->estante2 = [];
        $this->estante3 = [];
        $this->tope1 = 0;
        $this->tope2 = 0;
        $this->tope3 = 0;
    }

    public function insertarLibro(int $fila)
    {
        if ($fila == 1) {
            $this->tope1++;
            $this->estante1[] = "Libro $this->tope1";
        }
        if ($fila == 2) {
            $this->tope2++;
            $this->estante2[] = "Libro $this->tope2";
        }
        if ($fila == 3) {
            $this->tope3++;
            $this->estante3[] = "Libro $this->tope3";
        }
    }

    public function mostrarFila(int $fila)
    {
        echo "Estante $fila: ";
        if ($fila == 1) {
            echo implode(", ", $this->estante1);
        }
        if ($fila == 2) {
            echo implode(", ", $this->estante2);
        }
        if ($fila == 3) {
            echo implode(", ", $this->estante3);
        }
    }

    public function mostrarArmario()
    {
        echo "Estante 1: " . implode(", ", $this->estante1) . "<br>";
        echo "Estante 2: " . implode(", ", $this->estante2) . "<br>";
        echo "Estante 3: " . implode(", ", $this->estante3) . "<br>";
    }
}
