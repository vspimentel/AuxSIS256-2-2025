<?php

$a = $_GET["a"];
$b = $_GET["b"];
$suma = $a + $b;

?>

<style>
    table {
        border-spacing: 0;

        & td {
            background-color: green;
            padding: 5px;
        }
    }
</style>

<table border="1">
    <tr>
        <td><?= $a; ?></td>
        <td>+</td>
        <td><?= $b; ?></td>
        <td>=</td>
        <td><?= $suma; ?></td>
    </tr>
</table>