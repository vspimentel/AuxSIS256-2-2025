<?php
session_start();
if ($_SESSION['nombre'] == null) {
    header("Location:login.html");
    exit();
}
include("conexion.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] != "") {
    unlink("images/" . $_POST['imagen_old']);
    $nombre_archivo = $_FILES['imagen']['name'];
    $nombre_temporal = $_FILES['imagen']['tmp_name'];
    $extension = explode(".", $nombre_archivo);
    $imagen = uniqid() . "." . end($extension);
    copy($nombre_temporal, "images/" . $imagen);
} else {
    $imagen = $_POST['imagen_old'];
}
$sql = "UPDATE productos 
    SET 
        imagen=?,
        nombre=?,
        precio=?
WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssi", $imagen, $nombre, $precio, $id);
$stmt->execute();
header("Location:lista.php");
