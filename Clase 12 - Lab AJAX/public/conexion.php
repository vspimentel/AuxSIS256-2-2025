<?php
$con = new mysqli("localhost", "root", "", "db_citas_medicas");
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
}
