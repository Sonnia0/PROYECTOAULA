<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["descripcion"])) {
    $id = $conn->real_escape_string($_POST["id"]);
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $descripcion = $conn->real_escape_string($_POST["descripcion"]);

    // Variables para el manejo de la imagen
    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_tmp = $_FILES["imagen"]["tmp_name"];
    $imagen_tipo = $_FILES["imagen"]["type"];

    // Directorio donde se guardará la imagen (asegúrate de que exista)
    $upload_dir = '../img/';

    // Verificar si se está subiendo una nueva imagen
    if (!empty($imagen_nombre)) {
        // Guardar la nueva imagen en el directorio y obtener la ruta
        $ruta_imagen = $upload_dir . basename($imagen_nombre);
        if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            // Actualizar los datos en la base de datos, incluyendo la imagen
            $sql = "UPDATE categorias SET nombre_categoria='$nombre', descripcion_categoria='$descripcion', imagen_categoria='$ruta_imagen' WHERE id=$id";
        } else {
            echo "Error al subir el archivo de imagen.";
            exit();
        }
    } else {
        // Si no se seleccionó una nueva imagen, actualizar solo los campos de texto
        $sql = "UPDATE categorias SET nombre_categoria='$nombre', descripcion_categoria='$descripcion' WHERE id=$id";
    }

    // Ejecutar la consulta de actualización
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de visualización de categorías
        header("Location: visualizar_categorias.php");
        exit();
    } else {
        echo "Error al actualizar la categoría: " . $conn->error;
    }
} else {
    echo "Todos los campos son obligatorios.";
}

// Cerrar conexión
$conn->close();
?>
