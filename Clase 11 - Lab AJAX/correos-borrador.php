<?php
session_start();
include("conexion.php");

$uid = $_SESSION['id'];

$sql = "SELECT 
    correos.id,
    usuarios.email as destino,
    asunto, 
    estado 
FROM 
    correos
    INNER JOIN usuarios ON correos.id_destino = usuarios.id 
WHERE 
    id_usuario = $uid
    AND enviado = 0";

$result = $con->query($sql);

$data = [];

while ($correo = mysqli_fetch_array($result)) {
    $data[] = [
        'id' => $correo['id'],
        'destino' => $correo['destino'],
        'asunto' => $correo['asunto'],
        'estado' => $correo['estado']
    ];
}

echo json_encode($data);
