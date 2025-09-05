<?php
include 'estantes.php';

session_start();
$estantes = $_SESSION['estantes'];
$fila = $_GET['estante'];

$estantes->mostrarFila($fila);
