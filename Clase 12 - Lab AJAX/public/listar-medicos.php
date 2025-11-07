<?php

include("conexion.php");

$sql = "SELECT * FROM medicos";

$result = $con->query($sql);

?>

<?php while ($medico = mysqli_fetch_array($result)): ?>
    <tr
        class="bg-gray-200 border-b border-black last:rounded-b-xl last:border-0">
        <td class="p-1"><?= $medico['nombre'] ?></td>
        <td class="p-1"><?= $medico['especialidad'] ?></td>
        <td class="p-1"><?= $medico['telefono'] ?></td>
        <td class="p-1"><?= $medico['correo'] ?></td>
        <td class="p-1">
            <div class="flex gap-2">
                <div
                    class="px-2 py-1 bg-blue-500 text-white border border-blue-700 text-center cursor-pointer hover:bg-blue-400"
                    onclick="editarMedico(<?= $medico['id'] ?>)">
                    Editar
                </div>
                <div
                    class="px-2 py-1 bg-red-500 text-white border border-red-700 text-center cursor-pointer hover:bg-red-400"
                    onclick="eliminarMedico(<?= $medico['id'] ?>)">
                    Eliminar
                </div>
            </div>
        </td>
    </tr>
<?php endwhile; ?>