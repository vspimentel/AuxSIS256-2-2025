<?php

$fil = $_GET["fil"];
$col = $_GET["col"];

?>

<style>
    table {
        border-collapse: collapse;

        td {
            width: 50px;
            height: 20px;
        }
    }
</style>

<table border="1">
    <?php for ($i = 1; $i <= $fil; $i++): ?>
        <tr>
            <?php for ($j = 1; $j <= $col; $j++): ?>
                <?php
                $cellNumber = ($i - 1) * $col + $j;
                $colorIndex = ($cellNumber - 1) % 3;
                $colors = ['red', 'yellow', 'green'];
                $color = $colors[$colorIndex];
                ?>
                <td style="background-color: <?php echo $color; ?>;"></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>