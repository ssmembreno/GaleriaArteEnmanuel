document.addEventListener('DOMContentLoaded', function () {
    new Splide('#obraSlider', {
        type: 'loop',
        perPage: 3,
        focus: 'center',
        gap: '1rem',
        autoScroll: {
            speed: 0.8,
        },
        breakpoints: {
            1024: {
                perPage: 2,
            },
            768: {
                perPage: 1,
            }
        }
    }).mount(window.splide.Extensions);
});

