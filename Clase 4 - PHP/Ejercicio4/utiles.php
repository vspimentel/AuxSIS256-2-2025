<?php

class Utiles
{
    private string $cadena;

    public function __construct(string $cadena)
    {
        $this->cadena = $cadena;
    }

    public function aumentarGuiones(int $n): string
    {
        $cadenaFinal = "";
        for ($i = 0; $i < strlen($this->cadena); $i++) {
            $cadenaFinal .= $this->cadena[$i];
            if ($i < strlen($this->cadena) - 1) $cadenaFinal .= str_repeat("-", $n);
        }
        return $cadenaFinal;
    }
}
