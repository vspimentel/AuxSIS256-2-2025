<?php
include("conexion.php");

$order = isset($_GET['order']) ? $_GET['order'] : 'nombres';

$sql = "SELECT 
    *
FROM 
    usuarios
ORDER BY 
    $order ASC";

$result = $con->query($sql); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>
    <table border="1" class="tabla-usuarios">
        <tr>
            <th><a href="pregunta4.php?order=nombres">Nombres</a></th>
            <th><a href="pregunta4.php?order=apellidos">Apellidos</a></th>
            <th><a href="pregunta4.php?order=correo">Correos</a></th>
        </tr>
        <?php $count = 0; ?>
        <?php while ($usuario = mysqli_fetch_array($result)): ?>
            <tr>
                <td <?= $count % 2 != 0 ? "style='background-color: var(--naranja);'" : "" ?>><?= $usuario['nombres']; ?></td>
                <td <?= $count % 2 != 0 ? "style='background-color: var(--naranja);'" : "" ?>><?= $usuario['apellidos']; ?></td>
                <td <?= $count % 2 != 0 ? "style='background-color: var(--naranja);'" : "" ?>><a href="form_editar_correo.php?id=<?= $usuario['id']; ?>"><?= $usuario['correo']; ?></a></td>
            </tr>
        <?php $count++;
        endwhile; ?>
    </table>
</body>

</html>