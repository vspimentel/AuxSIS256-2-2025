<?php
include 'estantes.php';

session_start();
$estantes = $_SESSION['estantes'];

$estantes->mostrarArmario();
