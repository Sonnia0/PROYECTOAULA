function confirmarEliminacion(id) {
    const modal = document.getElementById('modal');
    const confirmDeleteButton = document.getElementById('confirmDeleteButton');
    
    confirmDeleteButton.onclick = function() {
        window.location.href = './eliminar_producto.php?id=' + id;
    };

    modal.style.display = 'block';
}

function cerrarModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
