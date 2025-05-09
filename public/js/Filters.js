document.addEventListener('DOMContentLoaded', () => {
    const minRange = document.getElementById('minRange');
    const maxRange = document.getElementById('maxRange');
    const minValue = document.getElementById('minValue');
    const maxValue = document.getElementById('maxValue');

    const filtros = document.querySelectorAll('.filtro');
    const contenedor = document.getElementById('galeria-obras');
    const form = document.getElementById('form-filtros');

    // Sincronizar sliders con inputs (solo cuando cambia el slider)
    minRange.addEventListener('input', () => {
        minValue.value = minRange.value;
    });

    maxRange.addEventListener('input', () => {
        maxValue.value = maxRange.value;
    });

    // Lanzar AJAX SOLO cuando se mueva el slider o cambie un filtro manual
    minRange.addEventListener('change', enviarPeticion);
    maxRange.addEventListener('change', enviarPeticion);
    minValue.addEventListener('change', enviarPeticion);
    maxValue.addEventListener('change', enviarPeticion);

    // Otros filtros
    filtros.forEach(filtro => {
        filtro.addEventListener('change', enviarPeticion);
    });

    document.getElementById('clear-filters').addEventListener('click', () => {
        form.reset();
        minRange.value = 0;
        maxRange.value = 5000;
        minValue.value = 0;
        maxValue.value = 5000;
        enviarPeticion();
    });

    function enviarPeticion() {
        const datos = new FormData(form);
        const params = new URLSearchParams(datos);

        fetch(filtrarObrasURL + '?' + params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(res => res.text())
            .then(html => {
                contenedor.innerHTML = html;
                inicializarBotonesFavoritos()
            })
            .catch(error => {
                console.error('Error al filtrar obras:', error);
            });
    }
});
