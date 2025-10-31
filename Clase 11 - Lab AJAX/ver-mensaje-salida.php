<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT 
    correos.id,
    usuarios.email as destino,
    asunto, 
    mensaje
FROM 
    correos
    INNER JOIN usuarios ON correos.id_destino = usuarios.id 
WHERE 
    correos.id = $id";

$result = $con->query($sql);

$correo = mysqli_fetch_array($result);

?>

<div class="modal">
    <h3>Asunto: <?= $correo['asunto']; ?></h3>
    <div>Para: <?= $correo['destino']; ?></div>
    <p><?= $correo['mensaje']; ?></p>
    <div class="row" style="justify-content: flex-end">
        <div
            class="button"
            style="border: 1px solid blue"
            onclick="cerrarModal()">
            Salir
        </div>
    </div>
</div>