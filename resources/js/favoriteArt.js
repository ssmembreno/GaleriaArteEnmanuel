//Accion realizada con AJAX para una mejor experiencia de usuario.
document.addEventListener('DOMContentLoaded', function () {
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        console.error("CSRF token not found");
        return;
    }

    const token = csrfTokenMeta.getAttribute('content');

    document.querySelectorAll('.toggle-favorito').forEach(button => {
        button.addEventListener('click', function () {
            const obraId = this.getAttribute('data-id');

            fetch(`/favoritos/${obraId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                }
            })
                .then(res => {
                    if (!res.ok) throw new Error('Error al marcar favorito');
                    return res.text();
                })
                .then(() => {
                    this.classList.add('bounce');

                    setTimeout(() => {
                        this.classList.remove('bounce');
                        this.textContent = this.textContent.includes('❤️') ? '🤍' : '❤️';
                    }, 300);
                })
                .catch(() => {
                    alert("Error al marcar como favorito");
                });
        });
    });
});

console.log('TEST')
