<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link href="../css/tailwind.css" rel="stylesheet">
    <link href="../css/modalUsuario.css" rel="stylesheet">
    <script src="../js/modal_Registro_Usuario.js" defer></script>
</head>
<body class="bg-gray-900 text-white flex flex-col min-h-screen">

    <!-- Banner -->
    <header class="bg-purple-500 text-gray-900 py-4 relative">
        <div class='absolute top-0 left-0'>
            <a href='../index.html' class='bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg text-xl shadow-lg'>Regresar al Índice</a>
        </div>
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold">Registrar Usuario</h1>
            <p class="mt-4 text-xl">Crea tu cuenta para acceder a nuestras bebidas exclusivas</p>
        </div>
    </header>

    <!-- Formulario de Registro -->
    <main class="container mx-auto my-10 flex-grow flex justify-center items-center">
        <form action="../php/registrar_usuario.php" method="post" class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <div class="mb-6">
                <label for="nombre" class="block text-sm font-medium text-gray-300">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="apellido" class="block text-sm font-medium text-gray-300">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="correo" class="block text-sm font-medium text-gray-300">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500" required>
            </div>
            <div class="mb-6">
                <label for="tipo_cuenta" class="block text-sm font-medium text-gray-300">Tipo de Cuenta</label>
                <select id="tipo_cuenta" name="tipo_cuenta" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500" required>
                    <option value="cliente">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full bg-purple-500 hover:bg-purple-600 text-gray-900 font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    Registrar
                </button>
            </div>
        </form>
    </main>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarModal()">&times;</span>
            <h2 id="modal-title" class="text-2xl font-bold mb-4"></h2>
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

    <!-- Script para mostrar el modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const mensaje = urlParams.get('mensaje');
            const status = urlParams.get('status');

            if (mensaje) {
                mostrarModal(mensaje, status === 'success');
            }
        });

        function mostrarModal(mensaje, esExito) {
            const modal = document.getElementById('modal');
            const modalMensaje = document.getElementById('modalMensaje');
            const modalTitle = document.getElementById('modal-title');

            modalMensaje.textContent = mensaje;

            if (esExito) {
                modalTitle.textContent = 'Registro Exitoso';
                modalTitle.style.color = 'green';
            } else {
                modalTitle.textContent = 'Error en el Registro';
                modalTitle.style.color = 'red';
            }

            modal.style.display = 'block';
        }

        function cerrarModal() {
            const modal = document.getElementById('modal');
            modal.style.display = 'none';
            window.location.href = 'registrar_usu.php';
        }
    </script>
</body>
</html>
