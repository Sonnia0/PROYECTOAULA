<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="../css/tailwind.css" rel="stylesheet">
    <link href="../css/modalProducto.css" rel="stylesheet">
    <script src="../js/modal_Crear_Producto.js" defer></script>
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

    <!-- Banner -->
    <header class="bg-purple-500 text-gray-900 py-4 relative">
        <div class="absolute top-0 left-0  ">
            <a href="../index.html" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg">Regresar al Índice</a>
        </div>
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold">Crear Nuevo Producto</h1>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto my-10 flex-grow flex justify-center items-center">
        <div class="max-w-lg w-full bg-gray-800 p-6 rounded-lg shadow-lg">
            <form id="registroForm" action="./registro_producto.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="precio" class="block text-white text-sm font-bold mb-2">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-white text-sm font-bold mb-2">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-white text-sm font-bold mb-2">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" required>
                </div>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg">Crear Producto</button>
                <div id="mensaje" class="mt-4"></div>
            </form>
            <!-- Mostrar mensaje después de la inserción -->
        </div>
    </main>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2 id="modal-title" class="text-2xl font-bold mb-4">Estado del Registro</h2>
            <p id="modalMensaje" class="text-lg"></p>
            <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg mt-4" onclick="cerrarModal()">Cerrar</button>
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
