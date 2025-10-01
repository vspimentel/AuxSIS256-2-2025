<?php
include 'Operaciones.php';
session_start();

$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];

$_SESSION['operaciones'] = new Operaciones($a, $b, $c);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>
    <form
        class="col"
        action="calcular.php"
        style="padding: 10px; width: 200px"
        method="post">
        <input style="background-color: var(--rojo); color: white" class="operacion" type="submit" name="operacion" value="Sumar" />
        <input style="background-color: var(--naranja)" class="operacion" type="submit" name="operacion" value="Restar" />
        <input style="background-color: var(--azul)" class="operacion" type="submit" name="operacion" value="Multiplicar" />
        <input style="background-color: var(--verde); color: white" class="operacion" type="submit" name="operacion" value="Dividir" />
    </form>
</body>

</html>