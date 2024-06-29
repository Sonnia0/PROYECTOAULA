<?php
include 'conexion.php'; // Incluir archivo de conexión

// Obtener todos los productos de la base de datos
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);

// Inicializar variable para verificar si hay productos
$hay_productos = false;

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    $hay_productos = true;
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Productos</title>
    <link href="../css/tailwind.css" rel="stylesheet">
    <link href="../css/modalProducto.css" rel="stylesheet">
    <script src="../js/modal_Eliminar_Producto.js" defer></script>
</head>

<body class="bg-gray-900 text-white flex flex-col min-h-screen">

    <!-- Banner -->
    <header class='bg-purple-500 text-gray-900 py-4 relative'>
        <div class='absolute top-0 left-0  '>
            <a href='../index.html' class='bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg'>Regresar al Índice</a>
        </div>
        <div class='container mx-auto text-center'>
            <h1 class='text-5xl font-bold'>Productos Registrados</h1>
        </div>
    </header>
    <!-- Contenido principal -->
    <main class="container mx-auto my-10 flex-grow flex justify-center items-center">
        <div class="max-w-4xl w-full overflow-x-auto">
            <?php if ($hay_productos) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <?php
                    // Mostrar cada producto
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<div class='bg-gray-800 p-6 rounded-lg shadow-lg'>
                                <img src='" . $fila['imagen_producto'] . "' alt='" . $fila['nombre_producto'] . "' class='w-full rounded-lg mb-4'>
                                <h2 class='text-2xl font-bold mb-2'>" . $fila['nombre_producto'] . "</h2>
                                <p class='text-lg text-gray-300 mb-2'>$" . number_format($fila['precio_producto'], 2) . "</p>
                                <p class='text-gray-400'>" . $fila['descripcion_producto'] . "</p>
                                <div class='mt-4'>
                                    <a href='./editar_producto.php?id=" . $fila['id'] . "' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mr-2'>Editar</a>
                                    <button onclick='confirmarEliminacion(" . $fila['id'] . ")' class='bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg'>Eliminar</button>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            <?php else : ?>
                <div class="flex flex-col items-center justify-center h-full">
                    <p class="text-3xl text-gray-300 mb-4">No hay productos registrados.</p>
                    <a href="./crear_producto.php" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg text-xl shadow-lg">Crear Producto</a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Modal -->
    <div id='modal' class='modal'>
        <div class='modal-content'>
            <span class='close' onclick='cerrarModal()'>&times;</span>
            <h2 id='modal-title' class='text-2xl font-bold mb-4'>Confirmar Eliminación</h2>
            <p id='modalMensaje' class='text-lg'>¿Estás seguro de que deseas eliminar este producto?</p>
            <div class='flex justify-end mt-4'>
                <button class='bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg mr-2' onclick='cerrarModal()'>Cancelar</button>
                <button id='confirmDeleteButton' class='bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg'>Eliminar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-6 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>
