<?php
session_start();
include("conexion.php");

$sql = "SELECT id, email, nombre, nivel, estado FROM usuarios";

$result = $con->query($sql);

?>

<?php if (!isset($_SESSION['email']) && $_SESSION['nivel'] != 1): ?>
    <tr>
        <td colspan="4">
            No autorizado
        </td>
    </tr>
<?php
    exit();
endif;
?>

<?php while ($usuario = mysqli_fetch_array($result)): ?>
    <tr>
        <td><?= $usuario['email']; ?></td>
        <td><?= $usuario['nombre']; ?></td>
        <td><?= $usuario['nivel'] == 1 ? 'Administrador' : 'Usuario'; ?></td>
        <td>
            <div
                class="button"
                style="
                    border: 1px solid blue;
                    background-color: rgb(120, 120, 237);
                    color: white;
                    width: 100px;
                  "
                onclick="cambiarEstado(<?= $usuario['estado'] == 1 ? 0 : 1; ?>, <?= $usuario['id']; ?>);">
                <?= $usuario['estado'] == 1 ? 'Deshabilitar' : 'Habilitar'; ?>
            </div>
        </td>
    </tr>
<?php endwhile; ?>