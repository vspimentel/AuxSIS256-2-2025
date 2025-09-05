<?php

include 'estantes.php';
session_start();

if (!isset($_SESSION['estantes'])) {
    $estantes = new Estantes();
    $_SESSION['estantes'] = $estantes;
}

?>

<a href="agregar_libro_form.html">Agregar libro</a>
<a href="mostrar_estante_form.html">Mostrar estante</a>
<a href="mostrar_armario.php">Mostrar armario</a>