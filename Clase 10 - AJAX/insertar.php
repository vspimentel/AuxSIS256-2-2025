<?php

include("conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$anio = $_POST['anio'];
$carrera = $_POST['carrera'];
$usuario = 1;

if (isset($_FILES['imagen'])) {
    $nombre_archivo = $_FILES['imagen']['name'];
    $nombre_temporal = $_FILES['imagen']['tmp_name'];
    $extension = explode(".", $nombre_archivo);
    $imagen = uniqid() . "." . end($extension);
    copy($nombre_temporal, "images/" . $imagen);
}

$sql = "INSERT INTO libros (
    imagen,
    titulo,
    autor,
    ideditorial,
    anio,
    idcarrera,
    idusuario
) VALUES(?,?,?,?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssisii", $imagen, $titulo, $autor, $editorial, $anio, $carrera, $usuario);

if ($stmt->execute()) echo "exito";
else echo "fallo";
