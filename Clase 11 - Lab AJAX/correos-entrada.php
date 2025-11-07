<?php
session_start();
include("conexion.php");

$uid = $_SESSION['id'];

$sql = "SELECT 
    correos.id,
    usuarios.email as origen,
    asunto, 
    estado 
FROM 
    correos
    INNER JOIN usuarios ON correos.id_usuario = usuarios.id 
WHERE 
    id_destino = $uid";

$result = $con->query($sql);

$data = [];

while ($correo = mysqli_fetch_array($result)) {
    $data[] = [
        'id' => $correo['id'],
        'origen' => $correo['origen'],
        'asunto' => $correo['asunto'],
        'estado' => $correo['estado']
    ];
}

echo json_encode($data);
