<?php

session_start();

if ($_SESSION['email'] == null) {
    header("Location:login.html");
    exit();
}

$nivel = $_SESSION['nivel'];

include("conexion.php");

$order = isset($_GET['order']) ? $_GET['order'] : 'titulo';


$sql = "SELECT
    l.id,
    l.imagen,  
    titulo,
    autor,
    anio,
    e.nombre AS editorial
FROM 
    libros l 
    INNER JOIN editoriales e ON l.id_editorial = e.id
ORDER BY
    $order ASC";

$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th {
            background-color: blue;
            color: white;
        }

        th,
        td {
            padding: 10px;
            text-align: left;

            a {
                color: black
            }
        }

        tr:nth-child(even) {
            background-color: lightblue;
        }

        a {
            color: white;
        }

        a:visited {
            color: white;
        }
    </style>
</head>

<body>
    <table border="1">
        <tr>
            <th>Imagen</th>
            <th><a href="lista.php?order=titulo">Titulo</a></th>
            <th><a href="lista.php?order=autor">Autor</a></th>
            <th><a href="lista.php?order=editorial">Editorial</a></th>
            <th><a href="lista.php?order=anio">Año</a></th>
            <?php if ($nivel == 1): ?>
                <th>Acciones</th>
            <?php endif; ?>
        </tr>
        <?php while ($libro = mysqli_fetch_array($result)): ?>
            <tr>
                <td><img src="images/<?= $libro['imagen']; ?>" height="100"></td>
                <td><?= $libro['titulo']; ?></td>
                <td><?= $libro['autor']; ?></td>
                <td><?= $libro['editorial']; ?></td>
                <td><?= $libro['anio']; ?></td>
                <?php if ($nivel == 1): ?>
                    <td>
                        <a href="eliminar.php?id=<?= $libro['id'] ?>">Eliminar</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>