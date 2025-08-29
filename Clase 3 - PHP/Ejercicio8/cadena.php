<?php

$cadena = $_GET["cadena"];
$tieneLaPalabra = false;
for ($i = 0; $i < strlen($cadena); $i++) {
    if ($cadena[$i] == 'S' || $cadena[$i] == 's') {
        $subcadena = substr($cadena, $i, 6);
        if ($subcadena == 'SCRIPT') {
            $tieneLaPalabra = true;
            echo "Tiene la palabra SCRIPT" . "<br />";;
            $cadena = str_ireplace('SCRIPT', '', $cadena);
            echo $cadena;
        }
    }
}

if (!$tieneLaPalabra) {
    echo "No tiene la palabra SCRIPT" . "<br />";
    echo $cadena;
}
