<?php
session_start();

$n = $_POST["n"];
?>

<form action="multiplicacion.php">
    <input type="hidden" name="n" value="<?php echo $n; ?>" />
    <label>Números</label>
    <?php for ($i = 0; $i < $n; $i++): ?>
        <input type="number" name="nums[]" required />
    <?php endfor; ?>
    <button>Enviar</button>
</form>