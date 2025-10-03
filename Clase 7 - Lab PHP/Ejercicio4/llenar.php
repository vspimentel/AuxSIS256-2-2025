<?php

$num = $_GET['num'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .col {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: start;
        }
    </style>
</head>

<body>
    <form action="ordenar.php" class="col">
        <?php for ($i = 0; $i < $num; $i++) : ?>
            <input type="text" name="palabras[]">
        <?php endfor; ?>
        <button>Enviar</button>
    </form>
</body>

</html>