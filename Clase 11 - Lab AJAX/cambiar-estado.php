<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['email']) && $_SESSION['nivel'] != 1) {
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit();
}

$id = $_POST['id'];
$estado = $_POST['estado'];

$sql = "UPDATE usuarios SET estado=? WHERE id=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $estado, $id);
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar el estado']);
}
