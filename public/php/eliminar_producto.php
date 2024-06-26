<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha enviado el ID del producto a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de visualización de productos
        header("Location: visualizar_productos.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

} else {
    echo "No se ha especificado el producto a eliminar.";
}

// Cerrar conexión
$conn->close();
?>
