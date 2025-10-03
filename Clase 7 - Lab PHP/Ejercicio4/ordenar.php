<?php

$palabras = $_GET['palabras'];

sort($palabras);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul {
            border: 1px solid red;
            background-color: yellow;
            width: 200px;
            padding: 20px;
            margin: 0 auto;
        }

        li {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <ul>
        <?php foreach ($palabras as $palabra): ?>
            <li><?= $palabra ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>