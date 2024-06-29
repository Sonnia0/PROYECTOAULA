function mostrarModal(mensaje, esExito) {
    const modal = document.getElementById('modal');
    const modalMensaje = document.getElementById('modalMensaje');
    const modalTitle = document.getElementById('modal-title');

    modalTitle.textContent = 'Estado del Registro';
    modalMensaje.textContent = mensaje;

    if (esExito) {
        modalTitle.style.color = 'green';
    } else {
        modalTitle.style.color = 'red';
    }

    modal.style.display = 'block';
}

function cerrarModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
    window.location.href = 'crear_categoria.php';
}

document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const mensaje = urlParams.get('mensaje');
    const status = urlParams.get('status');

    if (mensaje) {
        mostrarModal(mensaje, status === 'success');
    }
});