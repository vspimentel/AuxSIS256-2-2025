<?php
$n = $_COOKIE["n"];

$fact = 1;

for ($i = 1; $i <= $n; $i++) {
    $fact *= $i;
}

echo $fact;
