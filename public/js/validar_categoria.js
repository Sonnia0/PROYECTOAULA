function validarFormulario() {
    var nombre = document.getElementById("nombre").value.trim();
    var descripcion = document.getElementById("descripcion").value.trim();
    var imagen = document.getElementById("imagen").value.trim();

    if (nombre === "" || descripcion === "" || imagen === "") {
        mostrarModal("Todos los campos son obligatorios.");
        return false;
    }

    // Validar que el nombre no contenga números ni caracteres especiales (excepto la ñ)
    var nombreValido = /^[a-zA-ZñÑ\s]+$/.test(nombre);
    if (!nombreValido) {
        mostrarModal("El nombre de la categoría solo puede contener letras y espacios.");
        return false;
    }

    // Crear FormData para enviar los datos del formulario
    var formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("descripcion", descripcion);
    formData.append("imagen", document.getElementById("imagen").files[0]);

    // Crear instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open("POST", "registro_categoria.php", true);

    // Configurar la carga del evento
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById("registroForm").reset(); // Limpiar el formulario
            mostrarModal(xhr.responseText); // Mostrar mensaje del servidor
        } else {
            mostrarModal("Error en la solicitud.");
        }
    };

    // Enviar la solicitud
    xhr.send(formData);

    return false; // Evitar el envío normal del formulario
}

function mostrarModal(mensaje) {
    const modal = document.getElementById('modal');
    const modalMensaje = document.getElementById('modalMensaje');
    modalMensaje.textContent = mensaje;
    modal.classList.remove('hidden');
}

function cerrarModal() {
    const modal = document.getElementById('modal');
    modal.classList.add('hidden');
}
