<?php
include 'conexion.php'; // Incluir archivo de conexión

// Obtener todas las categorías de la base de datos
$sql = "SELECT * FROM categorias";
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Mostrar cada categoría de manera individual
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Visualizar Categorías</title>
        <link href='../css/tailwind.css' rel='stylesheet'>
        <link href='../css/modalCategoria.css' rel='stylesheet'>
        <script src='../js/modal_Eliminar_Categoria.js' defer></script>
    </head>
    <body class='bg-gray-900 text-gray-200 flex flex-col min-h-screen'>
    
        <!-- Banner -->
        <header class='bg-purple-500 text-gray-900 py-4 relative'>
        <div class='absolute top-0 left-0  '>
            <a href='../index.html' class='bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg'>Regresar al Índice</a>
        </div>
        <div class='container mx-auto text-center'>
            <h1 class='text-5xl font-bold'>Ver Categorias</h1>
        </div>
    </header>
    
        <!-- Contenido principal -->
        <main class='container mx-auto my-10 flex-grow flex flex-wrap justify-center gap-8'>
    ";

    // Mostrar cada categoría de manera individual
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div class='max-w-xs w-full md:max-w-sm rounded-lg overflow-hidden shadow-lg bg-gray-800'>
                <img class='w-full h-48 object-cover' src='" . $fila['imagen_categoria'] . "' alt='" . $fila['nombre_categoria'] . "'>
                <div class='px-6 py-4'>
                    <div class='font-bold text-xl mb-2'>" . $fila['nombre_categoria'] . "</div>
                    <p class='text-gray-300 text-base'>" . $fila['descripcion_categoria'] . "</p>
                </div>
                <div class='px-6 py-4 flex justify-center'>
                    <a href='./editar_categoria.php?id=" . $fila['id'] . "' class='bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg mr-2'>Editar</a>
                    <button onclick='confirmarEliminacion(" . $fila['id'] . ")' class='bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg'>Eliminar</button>
                </div>
              </div>";
    }

    echo "</main>
    
        <!-- Footer -->
        <footer class='bg-gray-800 text-gray-400 py-6 mt-auto'>
            <div class='container mx-auto text-center'>
                <p class='text-sm'>&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
            </div>
        </footer>

        <div id='modal' class='modal'>
            <div class='modal-content'>
                <span class='close' onclick='cerrarModal()'>&times;</span>
                <h2 id='modal-title' class='text-2xl font-bold mb-4'>Confirmar Eliminación</h2>
                <p id='modalMensaje' class='text-lg'>¿Estás seguro de que deseas eliminar esta categoría?</p>
                <div class='flex justify-end mt-4'>
                    <button class='bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg mr-2' onclick='cerrarModal()'>Cancelar</button>
                    <button id='confirmDeleteButton' class='bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg'>Eliminar</button>
                </div>
            </div>
        </div>
    
        </body>
        </html>";

} else {
    echo "No hay categorías registradas.";
}

// Cerrar conexión
$conn->close();
?>
