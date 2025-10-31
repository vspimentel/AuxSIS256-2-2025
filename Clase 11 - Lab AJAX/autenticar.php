<?php
session_start();
include("conexion.php");
$email = $_POST['email'];
$password = sha1($_POST['password']);
$sql = "SELECT id, email, nivel, estado FROM usuarios WHERE  email = ? AND password = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $estado = $usuario['estado'];
    if ($estado == 1) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nivel'] = $usuario['nivel'];
        echo json_encode(["success" => true, "nivel" => $usuario['nivel']]);
    } else {
        echo json_encode(["success" => false, "message" => "Usuario deshabilitado"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Credenciales incorrectas"]);
}
