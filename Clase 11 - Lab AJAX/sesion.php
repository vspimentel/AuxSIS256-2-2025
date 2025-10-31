<?php
session_start();
$nivel = $_SESSION['nivel'];

if (isset($_SESSION['email'])) {
    echo json_encode(['logged' => true, 'nivel' => $nivel]);
} else {
    echo json_encode(['logged' => false]);
}
