<?php

include 'conexion.php';

$sql = "SELECT id, editorial FROM editoriales";
$result = $con->query($sql);

?>

<?php while ($editorial = mysqli_fetch_array($result)): ?>
    <option value="<?= $editorial['id']; ?>"><?= $editorial['editorial']; ?></option>
<?php endwhile; ?>