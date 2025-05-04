//Prices range Filter
const minSlider = document.getElementById("minRange");
const maxSlider = document.getElementById("maxRange");
const minValueInput = document.getElementById("minValue");
const maxValueInput = document.getElementById("maxValue");

const minGap = 10;

function syncSliders() {
    let min = parseInt(minSlider.value);
    let max = parseInt(maxSlider.value);

    if (max - min < minGap) {
        if (event.target === minSlider) {
            min = max - minGap;
            minSlider.value = min;
        } else {
            max = min + minGap;
            maxSlider.value = max;
        }
    }

    minValueInput.value = min;
    maxValueInput.value = max;
}

function syncInputs() {
    let min = parseInt(minValueInput.value);
    let max = parseInt(maxValueInput.value);

    if (isNaN(min)) min = 0;
    if (isNaN(max)) max = 5000;

    if (max - min >= minGap && min >= 0 && max <= 5000) {
        minSlider.value = min;
        maxSlider.value = max;
    } else {
        if (event.target === minValueInput) {
            minValueInput.value = max - minGap;
            minSlider.value = max - minGap;
        } else {
            maxValueInput.value = min + minGap;
            maxSlider.value = min + minGap;
        }
    }
}

minSlider.addEventListener("input", syncSliders);
maxSlider.addEventListener("input", syncSliders);
minValueInput.addEventListener("input", syncInputs);
maxValueInput.addEventListener("input", syncInputs);


//Sistema de filtros Funcional con AJAX
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form-filtros");
    const inputs = form.querySelectorAll(".filtro");

    let timeout = null;

    function filtrarObras() {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const formData = new FormData(form);
            const queryString = new URLSearchParams(formData).toString();

            fetch(`${filtrarObrasURL}?${queryString}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById("galeria-obras").innerHTML = html;
                })
                .catch(error => {
                    console.error("Error al filtrar:", error);
                });
        }, 300); // Espera 300ms antes de ejecutar (evita spam de peticiones)
    }

    inputs.forEach(input => {
        input.addEventListener("input", filtrarObras);
        input.addEventListener("change", filtrarObras);
    });

    // Sincronizar sliders con inputs manuales
    const minSlider = document.getElementById("minRange");
    const maxSlider = document.getElementById("maxRange");
    const minInput = document.getElementById("minValue");
    const maxInput = document.getElementById("maxValue");
    const minGap = 10;

    function syncSliderInputs(event) {
        let min = parseInt(minSlider.value);
        let max = parseInt(maxSlider.value);

        if (max - min < minGap) {
            if (event.target === minSlider) {
                minSlider.value = max - minGap;
                min = parseInt(minSlider.value);
            } else {
                maxSlider.value = min + minGap;
                max = parseInt(maxSlider.value);
            }
        }

        minInput.value = min;
        maxInput.value = max;
        filtrarObras();
    }

    minSlider.addEventListener("input", syncSliderInputs);
    maxSlider.addEventListener("input", syncSliderInputs);

    minInput.addEventListener("input", () => {
        minSlider.value = minInput.value;
        filtrarObras();
    });

    maxInput.addEventListener("input", () => {
        maxSlider.value = maxInput.value;
        filtrarObras();
    });

    //Limpiar los filtros
    document.getElementById("clear-filters").addEventListener("click", function () {
        // Resetea todos los campos del formulario
        form.reset();

        // Restablece los sliders manualmente
        minSlider.value = 0;
        maxSlider.value = 5000;
        minInput.value = 0;
        maxInput.value = 5000;

        // Dispara el filtrado limpio
        filtrarObras();
    });

});

