<?php
session_start();
include("conexion.php");
$email = $_POST['email'];
$password = sha1($_POST['password']);
$sql = "SELECT 
    email, 
    nivel
FROM 
    usuarios  
WHERE  
    email = ? AND 
    password = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['nivel'] = $usuario['nivel'];
    header("Location:lista.php");
} else {
    header("Location:login.html");
}
