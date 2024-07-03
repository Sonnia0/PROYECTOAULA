<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Usuarios - Tienda de Bebidas</title>
    <link href="../css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

<header class="bg-purple-500 text-gray-900 py-10">
    <div class="container mx-auto text-center relative">
        <h1 class="text-5xl font-bold">Bienvenido a Nuestra Tienda de Bebidas</h1>
        <p class="mt-4 text-xl">Explora nuestras mejores categorías de bebidas alcohólicas</p>
        
        <!-- Botón para volver -->
        <a href="../index.html" class="absolute top-0 left-0 mt-4 ml-4 bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg">
            Volver
        </a>
    </div>
</header>



    <!-- Contenido principal -->
    <main class="container mx-auto my-10 flex-grow flex justify-center items-center">
        <div class="w-full lg:w-2/3 xl:w-2/3 bg-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold mb-4 text-center">Usuarios Registrados</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Correo</th>
                            <th class="px-4 py-2">Tipo de Cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       include 'conexion.php'; // Incluir archivo de conexión

                        // Consulta SQL para obtener usuarios
                        $sql = "SELECT id, nombre, apellido, correo, tipo_cuenta FROM usuarios";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Mostrar datos de cada usuario
                            while($row = $result->fetch_assoc()) {
                                echo "<tr class='bg-gray-900 text-white'>
                                        <td class='border px-4 py-2'>" . $row["id"] . "</td>
                                        <td class='border px-4 py-2'>" . $row["nombre"] . "</td>
                                        <td class='border px-4 py-2'>" . $row["apellido"] . "</td>
                                        <td class='border px-4 py-2'>" . $row["correo"] . "</td>
                                        <td class='border px-4 py-2'>" . $row["tipo_cuenta"] . "</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='border px-4 py-2 text-center'>No hay usuarios registrados</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-6 mt-auto">
        <div class="container mx-auto text-center">
            <p class="text-sm">&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
