<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["precio"]) && !empty($_POST["descripcion"])) {
    $id = $conn->real_escape_string($_POST["id"]);
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $precio = floatval($_POST["precio"]);
    $descripcion = $conn->real_escape_string($_POST["descripcion"]);

    // Verificar si se ha enviado una nueva imagen
    if (!empty($_FILES["imagen"]["name"])) {
        $imagen_nombre = $_FILES["imagen"]["name"];
        $imagen_tmp = $_FILES["imagen"]["tmp_name"];
        $imagen_tipo = $_FILES["imagen"]["type"];

        // Directorio donde se guardará la imagen (asegúrate de que exista)
        $upload_dir = '../img/';

        // Verificar si el directorio de carga existe, si no, crearlo
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Guardar la nueva imagen en una ubicación específica y obtener la ruta
        $ruta_imagen = $upload_dir . basename($imagen_nombre);
        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            // Actualizar datos incluyendo la imagen
            $sql = "UPDATE productos SET nombre_producto='$nombre', precio_producto=$precio, descripcion_producto='$descripcion', imagen_producto='$ruta_imagen' WHERE id=$id";
        } else {
            echo "Error al subir el archivo.";
            exit();
        }
    } else {
        // Actualizar datos sin cambiar la imagen
        $sql = "UPDATE productos SET nombre_producto='$nombre', precio_producto=$precio, descripcion_producto='$descripcion' WHERE id=$id";
    }

    // Ejecutar la consulta de actualización
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de visualización de productos
        header("Location: visualizar_productos.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
} else {
    echo "Todos los campos son obligatorios.";
}

// Cerrar conexión
$conn->close();
?>
