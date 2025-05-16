    document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
    method: 'POST',
    headers: {
    'X-CSRF-TOKEN': '{{ csrf_token() }}'
},
    body: formData
})
    .then(res => res.json())
    .then(data => {
    if (data.success) {
    const mensajeDiv = document.getElementById('mensajeEnviado');
    mensajeDiv.textContent = data.mensaje;
    mensajeDiv.style.display = 'block';
    form.reset();

    setTimeout(() => {
    mensajeDiv.style.display = 'none';
}, 4000);
}
})
    .catch(error => {
    alert('❌ Hubo un error al enviar el mensaje. Intenta de nuevo.');
});
});
