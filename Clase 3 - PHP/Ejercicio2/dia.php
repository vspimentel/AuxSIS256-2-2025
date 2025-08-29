<?php
$dia = $_GET["dia"];
?>

<select>
    <option value="1" <?= $dia == 1 ? 'selected' : '' ?>>Lunes</option>
    <option value="2" <?= $dia == 2 ? 'selected' : '' ?>>Martes</option>
    <option value="3" <?= $dia == 3 ? 'selected' : '' ?>>Miércoles</option>
    <option value="4" <?= $dia == 4 ? 'selected' : '' ?>>Jueves</option>
    <option value="5" <?= $dia == 5 ? 'selected' : '' ?>>Viernes</option>
    <option value="6" <?= $dia == 6 ? 'selected' : '' ?>>Sábado</option>
    <option value="7" <?= $dia == 7 ? 'selected' : '' ?>>Domingo</option>
</select>