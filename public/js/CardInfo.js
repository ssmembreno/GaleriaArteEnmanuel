document.addEventListener("DOMContentLoaded", function () {
    const tarjeta = document.querySelector('.tarjeta');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                tarjeta.classList.add('animada');
                observer.disconnect();
            }
        });
    }, {
        threshold: 0.3
    });

    observer.observe(tarjeta);
});
