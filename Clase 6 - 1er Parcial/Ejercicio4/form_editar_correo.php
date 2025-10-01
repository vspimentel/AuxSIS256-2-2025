<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT 
    *
FROM 
    usuarios
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
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>
    <form class="col" style="padding: 10px; width: 200px" action="actualizar.php" method="post">
        <input type="hidden" value="<?= $producto['id'] ?>" name="id">
        <label>Correo</label>
        <input type="email" name="correo" value="<?= $producto['correo'] ?>">
        <button>Enviar</button>
    </form>
</body>

</html>