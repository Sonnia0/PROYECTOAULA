<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha enviado el ID de la categoría a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar la categoría de la base de datos
    $sql = "DELETE FROM categorias WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: visualizar_categorias.php");
        exit();
    } else {
        echo "Error al eliminar la categoría: " . $conn->error;
    }

} else {
    echo "No se ha especificado la categoría a eliminar.";
}

// Cerrar conexión
$conn->close();
?>
