<?php
session_start();
if ($_SESSION['nombre'] == null) {
    header("Location:login.html");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT 
    *
FROM 
    productos
WHERE id = $id";

$result = $con->query($sql);

$producto = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        width: 200px;
        margin: auto;
        gap: 10px;
    }

    label {
        font-weight: bold;
    }
</style>

<body>
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $producto['imagen'] ?>" name="imagen_old">
        <input type="hidden" value="<?= $producto['id'] ?>" name="id">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= $producto['nombre'] ?>">
        <label>Precio</label>
        <input type="number" name="precio" value="<?= $producto['precio'] ?>">
        <label>Imagen</label>
        <input type="file" name="imagen">
        <button>Enviar</button>
    </form>
</body>

</html>