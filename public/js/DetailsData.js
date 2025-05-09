//Carrusel imagenes
document.addEventListener('DOMContentLoaded', function () {
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('mainImage');
    const mainImageWrapper = document.getElementById('mainImageWrapper');

    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            mainImage.classList.add('fade-out');
            setTimeout(() => {
                mainImage.src = thumbnail.src;
                mainImage.classList.remove('fade-out');
                // Cambiar el slide activo en el carousel también
                const carousel = new bootstrap.Carousel(document.getElementById('carouselImages'));
                carousel.to(index);
            }, 300);
        });
    });

    mainImageWrapper.addEventListener('click', function () {
        const myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
    });
});

//Modal password coments
function togglePassword() {
    const input = document.getElementById("loginPassword");
    input.type = input.type === "password" ? "text" : "password";
}




//Valoraciones
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('calificacion');
    const submitBtn = document.getElementById('submitValoracion');

    if (stars.length && ratingInput && submitBtn) {
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;
                submitBtn.disabled = false;

                stars.forEach(s => {
                    s.classList.remove('selected');
                    if (s.getAttribute('data-value') <= value) {
                        s.classList.add('selected');
                    }
                });
            });
        });
    }
});
