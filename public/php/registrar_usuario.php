<?php
session_start(); // Iniciar sesión para usar variables de sesión
include 'conexion.php'; // Incluir archivo de conexión

if ($conn->connect_error) {
    $_SESSION['message'] = "Error de conexión a la base de datos";
    $_SESSION['status'] = "error";
    header("Location: ./registrar_usu.php");
    exit();
}

// Obtener datos del formulario
$nombre = $conn->real_escape_string($_POST['nombre']);
$apellido = $conn->real_escape_string($_POST['apellido']);
$correo = $conn->real_escape_string($_POST['correo']);
$contraseña = $conn->real_escape_string($_POST['password']);
$tipo_cuenta = $conn->real_escape_string($_POST['tipo_cuenta']);

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, tipo_cuenta) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$tipo_cuenta')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Nuevo usuario registrado exitosamente";
    $_SESSION['status'] = "success";
} else {
    $_SESSION['message'] = "Error: " . $conn->error;
    $_SESSION['status'] = "error";
}
// Cerrar la conexión
$conn->close();
header("Location: ./registrar_usu.php");
exit();


?>
