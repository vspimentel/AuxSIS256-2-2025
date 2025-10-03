<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid green;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php

    $temp = $_GET['temp'];
    $unidad = $_GET['unidad'];

    if ($unidad == "C") { ?>
        <?php
        $f = ($temp * 9 / 5) + 32;
        $k =  $temp + 273.15;
        ?>
        <table>
            <tr>
                <td>Fahrenheit</td>
                <td><?php echo $f . "°F" ?></td>
            </tr>
            <tr>
                <td>Kelvin</td>
                <td><?php echo $k . "K" ?></td>
            </tr>
        </table>
    <?php } else if ($unidad == "F") { ?>
        <?php
        $c = ($temp - 32) * 5 / 9;
        $k = $c + 273.15;
        ?>
        <table>
            <tr>
                <td>Celsius</td>
                <td><?php echo $c . "°C" ?></td>
            </tr>
            <tr>
                <td>Kelvin</td>
                <td><?php echo $k . "K" ?></td>
            </tr>
        </table>
    <?php } else if ($unidad == "K") { ?>
        <?php
        $c = $temp - 273.15;
        $f = ($c * 9 / 5) + 32;
        ?>
        <table>
            <tr>
                <td>Celsius</td>
                <td><?php echo $c . "°C" ?></td>
            </tr>
            <tr>
                <td>Fahrenheit</td>
                <td><?php echo $f . "°F" ?></td>
            </tr>
        </table>
    <?php } ?>
</body>

</html>