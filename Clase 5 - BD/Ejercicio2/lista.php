<?php
session_start();
include("conexion.php");

if ($_SESSION['nombre'] == null) {
    header("Location:login.html");
    exit();
}

$nombre = $_SESSION['nombre'];
$nivel = $_SESSION['nivel'];

$sql = "SELECT 
    *
FROM 
    productos";

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>Nombre: <?= $nombre ?></div>
    <div>Nivel: <?= $nivel == 0 ? 'Usuario' : "Administrador" ?></div>

    <table border="1">
        <tr>
            <th>Imagen</th>
            <th>Producto</th>
            <th>Precio</th>
            <?php if ($nivel == 1): ?>
                <th>Acciones</th>
            <?php endif; ?>
        </tr>
        <?php while ($producto = mysqli_fetch_array($result)): ?>
            <tr>
                <td><img src="images/<?= $producto['imagen']; ?>" height="100"></td>
                <td><?= $producto['nombre']; ?></td>
                <td><?= $producto['precio']; ?>Bs.</td>
                <?php if ($nivel == 1): ?>
                    <td>
                        <div style="display: flex; gap: 5px">
                            <a href="f_editar.php?id=<?= $producto['id'] ?>">Editar</a>
                            <a href="eliminar.php?id=<?= $producto['id'] ?>">Eliminar</a>
                        </div>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php if ($nivel == 1): ?>
        <a href="f_insertar.html">Insertar</a>
    <?php endif; ?>

</body>

</html>