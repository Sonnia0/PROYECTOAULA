<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Categoría</title>
    <link href="../css/tailwind.css" rel="stylesheet">
    <script src="../js/validar_categoria.js"></script>
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

    <header class="bg-purple-500 text-gray-900 py-10">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold">Crear Nueva Categoría</h1>
        </div>
    </header>

    <main class="container mx-auto my-10 flex-grow flex justify-center items-center">
        <div class="max-w-lg mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
            <form id="registroForm" action="registro_categoria.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                <div class="mb-4">
                    <label for="nombre" class="block text-white text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-white text-sm font-bold mb-2">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="imagen" class="block text-white text-sm font-bold mb-2">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" class="bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500" accept="image/*" required>
                </div>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg">Crear Categoría</button>
                <div id="mensaje" class="mt-4"></div>
            </form>
        </div>
    </main>

    <footer class="bg-gray-800 text-gray-400 py-6 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
        </div>
    </footer>

   

</body>
</html>
