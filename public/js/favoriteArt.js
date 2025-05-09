function inicializarBotonesFavoritos() {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error("CSRF token not found");
        return;
    }

    const token = csrfTokenMeta.getAttribute('content');
    const obrasFavoritas = window.obrasFavoritas || [];

    document.querySelectorAll('.btn-favorito-toggle').forEach(button => {
        // Prevenir múltiples asignaciones
        if (button.dataset.eventAttached === "true") return;
        button.dataset.eventAttached = "true";

        const obraId = parseInt(button.dataset.id);
        const icon = button.querySelector('i');
        const isAuth = button.dataset.auth === 'true';

        // Estado inicial
        if (obrasFavoritas.includes(obraId)) {
            button.classList.add('activo');
            icon.classList.remove('fa-regular');
            icon.classList.add('fa-solid');
        } else {
            button.classList.remove('activo');
            icon.classList.remove('fa-solid');
            icon.classList.add('fa-regular');
        }

        button.addEventListener('click', function (e) {
            if (!isAuth) return; // El modal se abre solo si no está logueado

            e.preventDefault();

            fetch(`/favoritos/${obraId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                }
            })
                .then(res => {
                    if (!res.ok) throw new Error('No autorizado');
                    return res.json();
                })
                .then(data => {
                    button.classList.add('bounce');
                    setTimeout(() => button.classList.remove('bounce'), 300);

                    if (data.favorito) {
                        button.classList.add('activo');
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid');
                    } else {
                        button.classList.remove('activo');
                        icon.classList.remove('fa-solid');
                        icon.classList.add('fa-regular');
                    }
                })
                .catch(() => {
                    alert("Error al marcar como favorito");
                });
        });
    });
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    inicializarBotonesFavoritos();
});
