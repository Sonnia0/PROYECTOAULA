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

document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');
    const status = urlParams.get('status');

    if (mensaje) {
        mostrarModal(mensaje, status === 'success');
    }
});
