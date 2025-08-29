<?php

$fil = $_GET["fil"];
$col = $_GET["col"];

?>

<style>
    table {
        border-collapse: collapse;

        td,
        th {
            padding: 5px;
        }

        th {
            background-color: rgb(172, 172, 172);
        }
    }
</style>

<table border="1">
    <?php for ($i = 0; $i <= $fil; $i++): ?>
        <tr>
            <?php for ($j = 0; $j <= $col; $j++): ?>
                <?php if ($i == 0 && $j == 0): ?>
                    <th></th>
                <?php elseif ($i == 0): ?>
                    <th><?= $j; ?></th>
                <?php elseif ($j == 0): ?>
                    <th><?= $i; ?></th>
                <?php else: ?>
                    <td><?= $i * $j; ?></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>