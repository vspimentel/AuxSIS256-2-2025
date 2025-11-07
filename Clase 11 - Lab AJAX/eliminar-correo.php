<?php

include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM correos WHERE id = $id";
$result = $con->query($sql);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al eliminar el correo']);
}
