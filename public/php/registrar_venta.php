<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta</title>
    <link href="../css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

<!-- Header -->
<header class="bg-purple-500 text-gray-900 py-10">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-4xl font-bold">Registrar Nueva Venta</h1>
        <a href="../index.html" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg text-center">
            Volver al Inicio
        </a>
    </div>
</header>

<!-- Formulario de Registro de Venta -->
<main class="container mx-auto my-10 flex-grow flex justify-center items-center">
    <form id="ventaForm" action="registrar_venta.php" method="POST" class="bg-gray-800 p-10 rounded-lg shadow-lg w-full max-w-lg">
        <label for="cliente" class="block text-lg mb-2">Cliente:</label>
        <input type="text" id="cliente" name="cliente" class="w-full p-2 mb-4 text-gray-900" required>
        
        <label for="producto" class="block text-lg mb-2">Producto:</label>
        <input type="text" id="producto" name="producto" class="w-full p-2 mb-4 text-gray-900" required>
        
        <label for="cantidad" class="block text-lg mb-2">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" class="w-full p-2 mb-4 text-gray-900" required>
        
        <label for="precio" class="block text-lg mb-2">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" class="w-full p-2 mb-4 text-gray-900" required>
        
        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg w-full">Registrar Venta</button>
    </form>
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-400 py-6 mt-auto">
    <div class="container mx-auto text-center">
        <p class="text-sm">&copy; 2024 Tienda de Bebidas. Todos los derechos reservados.</p>
    </div>
</footer>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    function registrarVenta($cliente, $producto, $cantidad, $precio) {
        try {
            $dsn = 'mysql:host=localhost;dbname=ventas_db';
            $username = 'root';
            $password = '';
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

            $pdo = new PDO($dsn, $username, $password, $options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO ventas (cliente, producto, cantidad, precio) VALUES (:cliente, :producto, :cantidad, :precio)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cliente', $cliente);
            $stmt->bindParam(':producto', $producto);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':precio', $precio);
            $stmt->execute();

            return "success";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    if (empty($cliente) || empty($producto) || empty($cantidad) || empty($precio)) {
        echo "<script>alert('Todos los campos son obligatorios.');</script>";
    } else {
        $resultado = registrarVenta($cliente, $producto, $cantidad, $precio);

        if ($resultado == "success") {
            echo "<script>alert('Venta registrada correctamente.');</script>";
        } else {
            echo "<script>alert('Error al registrar la venta: $resultado');</script>";
        }
    }
}
?>

</body>
</html>
