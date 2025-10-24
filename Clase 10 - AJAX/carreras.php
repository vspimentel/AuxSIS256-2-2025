<?php

include 'conexion.php';

$sql = "SELECT id, carrera FROM carreras";
$result = $con->query($sql);

?>

<?php while ($carrera = mysqli_fetch_array($result)): ?>
    <option value="<?= $carrera['id']; ?>"><?= $carrera['carrera']; ?></option>
<?php endwhile; ?>