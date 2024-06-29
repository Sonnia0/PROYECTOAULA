function validarFormulario() {
    var nombre = document.getElementById("nombre").value.trim();
    var precio = document.getElementById("precio").value.trim();
    var descripcion = document.getElementById("descripcion").value.trim();
    var imagen = document.getElementById("imagen").value.trim();

    if (nombre === "" || precio === "" || descripcion === "" || imagen === "") {
        mostrarMensaje("Todos los campos son obligatorios.");
        return false;
    }

    // Validar que el nombre no contenga números ni caracteres especiales (excepto la ñ)
    var nombreValido = /^[a-zA-ZñÑ\s]+$/.test(nombre);
    if (!nombreValido) {
        mostrarMensaje("El nombre del producto solo puede contener letras y espacios.");
        return false;
    }

    // Validar que el precio sea un número válido
    var precioValido = /^\d+(\.\d{1,2})?$/.test(precio);
    if (!precioValido) {
        mostrarMensaje("El precio debe ser un número válido con máximo dos decimales.");
        return false;
    }

    // Crear FormData para enviar los datos del formulario
    var formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("precio", precio);
    formData.append("descripcion", descripcion);
    formData.append("imagen", document.getElementById("imagen").files[0]);

    // Crear instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open("POST", "registro_producto.php", true);

    // Configurar la carga del evento
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("registroForm").reset(); // Limpiar el formulario
            mostrarMensaje(xhr.responseText); // Mostrar mensaje del servidor
        } else {
            mostrarMensaje("Error en la solicitud.");
        }
    };

    // Enviar la solicitud
    xhr.send(formData);

    return false; // Evitar el envío normal del formulario
}

function mostrarMensaje(mensaje) {
    document.getElementById("mensaje").innerHTML = "<p class='text-center mt-4'>" + mensaje + "</p>";
}