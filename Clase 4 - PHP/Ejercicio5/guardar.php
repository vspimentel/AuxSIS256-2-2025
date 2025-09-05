<?php

$n = $_GET["n"];
setcookie("n", $n, time() + 3600);

echo "El número $n fue guardado en una cookie.";
