<?php
include("conexion.php");
$id = $_POST['id'];
$correo = $_POST['correo'];
$sql = "UPDATE usuarios 
    SET 
        correo=?
WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("si", $correo, $id);
$stmt->execute();
header("Location:pregunta4.php");
