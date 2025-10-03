<?php
session_start();
if ($_SESSION['email'] == null) {
    echo "Acceso denegado";
    exit();
}
include("conexion.php");
$id = $_GET['id'];

$sql = "DELETE FROM libros WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location:lista.php");
