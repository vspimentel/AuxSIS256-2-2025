<?php

session_start();
include("conexion.php");

if (!isset($_SESSION['email']) && $_SESSION['nivel'] != 1) {
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit();
}

$uid = $_SESSION['id'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$enviado = 1;
$sql = "SELECT id FROM usuarios";

$result = $con->query($sql);

while ($usuario = mysqli_fetch_array($result)) {
    $id = $usuario['id'];
    if ($id == $uid) continue;
    $sql = "INSERT INTO correos (
    id_usuario,
    id_destino,
    asunto,
    mensaje,
    enviado
) VALUES(?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iissi", $uid, $id, $asunto, $mensaje, $enviado);
    if ($stmt->execute()) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'message' => 'Fallo al enviar aviso'];
        $stmt->close();
        break;
    }
}

echo json_encode($response);
