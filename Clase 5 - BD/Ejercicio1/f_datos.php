<?php

include "conexion.php";

$numero = $_GET['numero'];

$sql = "SELECT * FROM carreras";

$result = $con->query($sql);

$carreras = [];
while ($carrera = mysqli_fetch_array($result)) {
    $carreras[] = $carrera;
}

?>

<form action="lista_alumnos.php" method="post">
    <table>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>CU</th>
            <th>Sexo</th>
            <th>Carrera</th>
        </tr>
        <?php for ($i = 0; $i < $numero; $i++): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td>
                    <input type="text" name="estudiantes[<?= $i ?>][nombre]">
                </td>
                <td>
                    <input type="text" name="estudiantes[<?= $i ?>][apellidos]">
                </td>
                <td>
                    <input type="text" name="estudiantes[<?= $i ?>][cu]">
                </td>
                <td>
                    <div style="display: flex; gap: 5px">
                        <input type="radio" name="estudiantes[<?= $i ?>][sexo]" value="Hombre" checked>
                        <label>Hombre</label>
                        <input type="radio" name="estudiantes[<?= $i ?>][sexo]" value="Mujer">
                        <label>Mujer</label>
                    </div>
                </td>
                <td>
                    <select name="estudiantes[<?= $i ?>][carrera]">
                        <?php foreach ($carreras as $carrera): ?>
                            <option value="<?= $carrera['id'] ?>"><?= $carrera['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        <?php endfor; ?>
    </table>
    <button>Enviar</button>
</form>