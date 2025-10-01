<?php
include 'Operaciones.php';
session_start();
$operaciones = $_SESSION['operaciones'];
$operacion = $_POST['operacion'];

switch ($operacion) {
    case 'Sumar':
        $resultado = $operaciones->sumar();
        break;
    case 'Restar':
        $resultado = $operaciones->restar();
        break;
    case 'Multiplicar':
        $resultado = $operaciones->multiplicar();
        break;
    case 'Dividir':
        $resultado = $operaciones->division();
        break;
    default:
        $resultado = "Operación no válida";
        break;
}
