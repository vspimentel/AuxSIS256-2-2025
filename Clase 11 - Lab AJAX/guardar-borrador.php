<?php

session_start();
include("conexion.php");

if (!isset($_SESSION['email']) && $_SESSION['nivel'] != 1) {
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit();
}

$uid = $_SESSION['id'];
$destino = $_POST['destino'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$enviado = 0;

$sql = "SELECT id FROM usuarios WHERE email = '$destino'";

$result = $con->query($sql);
$persona = mysqli_fetch_array($result);
$id_destino = $persona['id'];

$sql = "INSERT INTO correos (
    id_usuario,
    id_destino,
    asunto,
    mensaje,
    enviado
) VALUES(?,?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("iissi", $uid, $id_destino, $asunto, $mensaje, $enviado);

if ($stmt->execute()) {
    $response = ['success' => true];
} else {
    $response = ['success' => false, 'message' => 'Fallo al enviar aviso'];
}

echo json_encode($response);
