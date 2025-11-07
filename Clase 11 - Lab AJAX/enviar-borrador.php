<?php
session_start();

include("conexion.php");

$id = $_POST['id'];
$enviado = 1;

$sql = "UPDATE correos SET enviado=? WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $enviado, $id);

if ($stmt->execute()) {
    $response = ['success' => true];
} else {
    $response = ['success' => false, 'message' => 'Fallo al enviar aviso'];
}

echo json_encode($response);
