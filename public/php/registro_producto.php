<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha enviado el formulario y los campos obligatorios están presentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["imagen"]["name"]) && !empty($_POST["nombre"]) && !empty($_POST["precio"]) && !empty($_POST["descripcion"])) {
    // Preparar datos para la inserción
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $precio = floatval($_POST["precio"]);
    $descripcion = $conn->real_escape_string($_POST["descripcion"]);
    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_tmp = $_FILES["imagen"]["tmp_name"];
    $imagen_tipo = $_FILES["imagen"]["type"];

    // Directorio donde se guardará la imagen (asegúrate de que exista)
    $upload_dir = '../img/';

    // Verificar si el directorio de carga existe, si no, crearlo
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Guardar la imagen en una ubicación específica y obtener la ruta
    $ruta_imagen = $upload_dir . basename($imagen_nombre);
    if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO productos (nombre_producto, precio_producto, descripcion_producto, imagen_producto) 
                VALUES ('$nombre', $precio, '$descripcion', '$ruta_imagen')";

        if ($conn->query($sql) === TRUE) {
            $mensaje = "El producto se registró correctamente.";
            $status = "success";
        } else {
            $mensaje = "Error: " . $sql . "<br>" . $conn->error;
            $status = "error";
        }
    } else {
        $mensaje = "Error al subir el archivo.";
        $status = "error";
    }
} else {
    $mensaje = "Todos los campos son obligatorios.";
    $status = "error";
}

// Cerrar conexión
$conn->close();

// Redirigir de vuelta al formulario con el mensaje y el estado
header("Location: crear_producto.php?mensaje=" . urlencode($mensaje) . "&status=" . $status);
exit();
?>
