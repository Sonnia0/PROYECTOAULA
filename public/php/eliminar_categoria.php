<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha recibido un ID de categoría para eliminar
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);

    // Eliminar la categoría de la base de datos
    $sql = "DELETE FROM categorias WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Categoría eliminada correctamente.";
        $status = "success";
    } else {
        $mensaje = "Error al eliminar la categoría: " . $conn->error;
        $status = "error";
    }
} else {
    $mensaje = "ID de categoría no especificado.";
    $status = "error";
}

// Cerrar conexión
$conn->close();

// Redirigir de vuelta a la página de visualización de categorías con el mensaje y el estado
header("Location: visualizar_categorias.php?mensaje=" . urlencode($mensaje) . "&status=" . $status);
exit();
?>
