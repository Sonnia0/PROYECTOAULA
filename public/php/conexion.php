<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "bebidas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
