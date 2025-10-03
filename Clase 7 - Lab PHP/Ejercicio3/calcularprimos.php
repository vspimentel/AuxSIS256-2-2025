<?php

$num = $_GET['num'];

$primos = [];
$i = 2;
while (count($primos) < $num) {
    $esPrimo = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $esPrimo = false;
            break;
        }
    }

    if ($esPrimo) {
        array_push($primos, $i);
    }
    $i++;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul {
            border: 1px solid green;
            background-color: yellow;
            width: 200px;
            padding: 20px;
        }

        li {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <ul>
        <?php foreach ($primos as $p) : ?>
            <li><?php echo $p ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>