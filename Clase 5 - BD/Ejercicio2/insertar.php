<?php
session_start();
if ($_SESSION['nombre'] == null) {
    echo "Acceso denegado";
    exit();
}


include("conexion.php");
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
if (isset($_FILES['imagen'])) {
    $nombre_archivo = $_FILES['imagen']['name'];
    $nombre_temporal = $_FILES['imagen']['tmp_name'];
    $extension = explode(".", $nombre_archivo);
    $imagen = uniqid() . "." . end($extension);
    copy($nombre_temporal, "images/" . $imagen);
}
$sql = "INSERT INTO productos (
    imagen,
    nombre,
    precio
) VALUES(?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $imagen, $nombre, $precio);
$stmt->execute();
header("Location:lista.php");
