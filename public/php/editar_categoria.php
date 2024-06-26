<?php
include 'conexion.php'; // Incluir archivo de conexión

// Verificar si se ha enviado el ID de la categoría a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener datos de la categoría específica
    $sql = "SELECT * FROM categorias WHERE id = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {
        $categoria = $resultado->fetch_assoc();

        // Mostrar formulario para editar la categoría
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Editar Categoría</title>
            <link href='../css/tailwind.css' rel='stylesheet'>
        </head>
        <body class='bg-gray-900 text-white flex flex-col min-h-screen'>
        
            <!-- Banner -->
            <header class='bg-purple-500 text-gray-900 py-10'>
                <div class='container mx-auto text-center'>
                    <h1 class='text-5xl font-bold'>Editar Categoría</h1>
                </div>
            </header>
        
            <!-- Contenido principal -->
            <main class='container mx-auto my-10 flex-grow flex justify-center items-center'>
                <div class='max-w-lg mx-auto bg-gray-800 p-6 rounded-lg shadow-lg'>
                    <form action='./actualizar_categoria.php' method='POST' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='" . $categoria['id'] . "'>
                        <div class='mb-4'>
                            <label for='nombre' class='block text-white text-sm font-bold mb-2'>Nombre:</label>
                            <input type='text' id='nombre' name='nombre' value='" . $categoria['nombre_categoria'] . "' class='bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500' required>
                        </div>
                        <div class='mb-4'>
                            <label for='descripcion' class='block text-white text-sm font-bold mb-2'>Descripción:</label>
                            <textarea id='descripcion' name='descripcion' rows='4' class='bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500' required>" . $categoria['descripcion_categoria'] . "</textarea>
                        </div>
                        <div class='mb-4'>
                            <label for='imagen' class='block text-white text-sm font-bold mb-2'>Imagen:</label>
                            <input type='file' id='imagen' name='imagen' accept='image/*' class='bg-gray-700 appearance-none border-2 border-gray-700 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none focus:bg-gray-600 focus:border-indigo-500'>
                        </div>
                        <button type='submit' class='bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg'>Actualizar Categoría</button>
                    </form>
                </div>
            </main>
        
            <!-- Footer -->
            <footer class='bg-gray-800 text-gray-400 py-6 mt-auto'>
                <div class='container mx-auto text-center'>
                    <p class='text-sm'>&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
                </div>
            </footer>
        
            </body>
            </html>";

    } else {
        echo "No se encontró la categoría solicitada.";
    }

} else {
    echo "No se ha especificado la categoría a editar.";
}

// Cerrar conexión
$conn->close();
?>
