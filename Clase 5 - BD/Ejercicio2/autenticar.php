<?php
session_start();
include("conexion.php");
$nombre = $_POST['nombre'];
$password = sha1($_POST['password']);
echo $nombre . " " . $password;
$sql = "SELECT 
    nombre, 
    nivel
FROM 
    usuarios  
WHERE  
    nombre = ? AND 
    password=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $nombre, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['nivel'] = $usuario['nivel'];
    header("Location:lista.php");
} else {
    echo "Error datos de autenticación incorrectos";
}
