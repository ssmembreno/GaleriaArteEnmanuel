document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('comentario-form');

    form?.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            });

            if (!response.ok) throw new Error('Error al enviar el comentario');

            // Mostrar el mensaje de éxito
            const mensaje = document.getElementById('mensaje-exito');
            mensaje.classList.remove('d-none');
            mensaje.textContent = '¡Comentario enviado con éxito! Será visible tras ser aprobado.';

            form.reset();

            setTimeout(() => {
                mensaje.classList.add('d-none');
            }, 4000);

        } catch (error) {
            alert('Hubo un error al enviar el comentario.');
            console.error(error);
        } finally {
            submitButton.disabled = false;
        }
    });
});
