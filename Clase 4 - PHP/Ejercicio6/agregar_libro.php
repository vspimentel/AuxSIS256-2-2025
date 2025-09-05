<?php
include 'estantes.php';

session_start();
$estantes = $_SESSION['estantes'];
$fila = $_GET['estante'];

$estantes->insertarLibro($fila);
$_SESSION['estantes'] = $estantes;

echo "Libro agregado al estante $fila";
