<?php

include 'conexion.php';

$sql = "SELECT imagen FROM libros";
$result = $con->query($sql);

?>

<div class="galeria">
    <?php while ($libro = mysqli_fetch_array($result)): ?>
        <div class="libro">
            <img src="images/<?= $libro['imagen']; ?>" />
        </div>
    <?php endwhile; ?>
</div>