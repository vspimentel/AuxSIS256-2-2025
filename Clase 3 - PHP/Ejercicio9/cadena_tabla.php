<?php

$cadena1 = $_GET["cadena1"];
$cadena2 = $_GET["cadena2"];

$indexCruce = -1;

for ($i = 0; $i < strlen($cadena1); $i++) {
    for ($j = 0; $j < strlen($cadena2); $j++) {
        if ($cadena1[$i] == $cadena2[$j]) {
            $indexCruce = $i;
            break 2;
        }
    }
}
?>

<style>
    table {
        border-spacing: 0;

        td {
            padding: 5px;
            text-transform: uppercase;
        }
    }
</style>

<table border="1">
    <?php for ($i = 0; $i < strlen($cadena2); $i++): ?>
        <tr>
            <?php for ($j = 0; $j < strlen($cadena1); $j++): ?>
                <?php if ($j == $indexCruce): ?>
                    <td><?= $cadena2[$i] ?></td>
                <?php elseif ($i == $indexCruce): ?>
                    <td><?= $cadena1[$j] ?></td>
                <?php else: ?>
                    <td></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>