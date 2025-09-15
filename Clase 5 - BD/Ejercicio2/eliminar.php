<?php
session_start();
if ($_SESSION['nombre'] == null) {
    echo "Acceso denegado";
    exit();
}
include("conexion.php");
$id = $_GET['id'];

$sql = "SELECT 
    *
FROM 
    productos
WHERE id = $id";

$result = $con->query($sql);

$producto = mysqli_fetch_array($result);
$imagen = $producto['imagen'];

$sql = "DELETE FROM productos WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
unlink("images/" . $imagen);

header("Location:lista.php");
