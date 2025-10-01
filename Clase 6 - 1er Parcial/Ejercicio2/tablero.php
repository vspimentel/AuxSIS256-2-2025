<?php

$filas = $_POST['filas'];
$columnas = $_POST['columnas'];
$fila = $_POST['fila'];
$columna = $_POST['columna'];
$color = $_POST['color'];
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
    <table border="1">
        <?php for ($i = 0; $i < $filas; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < $columnas; $j++): ?>
                    <td <?= (($i + $j) % 2 == 0) ? '' : "style=\"background-color: $color;\""; ?>>
                        <?php if ($i == $fila && $j == $columna): ?>
                            <div style="width:100%; height: 100%; display: flex; justify-content: center; align-items: center">
                                <img src="../images/logo.png" width="40" height="40">
                            </div>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>