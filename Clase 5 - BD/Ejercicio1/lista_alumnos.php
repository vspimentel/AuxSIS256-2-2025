<?php

include("conexion.php");
$estudiantes = $_POST['estudiantes'];
foreach ($estudiantes as $estudiante) {
    $nombres = $estudiante['nombre'];
    $apellidos = $estudiante['apellidos'];
    $sexo = $estudiante['sexo'];
    $cu = $estudiante['cu'];
    $carrera = $estudiante['carrera'];
    $sql = "INSERT INTO estudiantes (nombres, apellidos, sexo, cu, id_carrera) Values(?,?,?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssi", $nombres, $apellidos, $sexo, $cu, $carrera);
    $stmt->execute();
}

$sql = "SELECT 
    nombres, 
    apellidos, 
    cu, 
    sexo, 
    c.nombre AS carrera 
FROM 
    estudiantes e
    LEFT JOIN carreras c on e.id_carrera = c.id";

$result = $con->query($sql);
$i = 1;
?>

<table border="1">
    <tr>
        <th>No/</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>CU</th>
        <th>Sexo</th>
        <th>Carrera</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['nombres']; ?> </td>
            <td><?= $row['apellidos']; ?> </td>
            <td><?= $row['sexo']; ?> </td>
            <td><?= $row['cu']; ?> </td>
            <td><?= $row['carrera']; ?> </td>
        </tr>
        <?php $i++; ?>
    <?php endwhile; ?>
</table>
<a href="f_introduccion.html">Insertar</a>

<?php
$con->close();
?>