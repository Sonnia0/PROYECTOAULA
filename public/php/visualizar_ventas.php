<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Ventas</title>
    <link href="../css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

<!-- Header -->
<header class="bg-purple-500 text-gray-900 py-10">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-4xl font-bold">Listado de Ventas</h1>
        <a href="../index.html" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg text-center">
            Volver al Inicio
        </a>
    </div>
</header>

<!-- Contenido principal -->
<main class="container mx-auto my-10 flex-grow">
    <table class="min-w-full bg-gray-800 rounded-lg overflow-hidden">
        <thead class="bg-gray-700">
            <tr>
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Cliente</th>
                <th class="py-3 px-4 text-left">Producto</th>
                <th class="py-3 px-4 text-left">Cantidad</th>
                <th class="py-3 px-4 text-left">Precio</th>
                <th class="py-3 px-4 text-left">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                // Conexión a la base de datos
                $dsn = 'mysql:host=localhost;dbname=ventas_db';
                $username = 'root';
                $password = '';
                $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                );

                $pdo = new PDO($dsn, $username, $password, $options);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Obtener las ventas
                $sql = "SELECT * FROM ventas";
                $stmt = $pdo->query($sql);
                $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Mostrar las ventas
                foreach ($ventas as $venta) {
                    echo "<tr>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($venta['id']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($venta['cliente']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($venta['producto']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($venta['cantidad']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($venta['precio']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($venta['fecha']) . "</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='6' class='py-3 px-4 text-center'>Error al obtener las ventas: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-400 py-6 mt-auto">
    <div class="container mx-auto text-center">
        <p class="text-sm">&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
    </div>
</footer>

</body>
</html>
