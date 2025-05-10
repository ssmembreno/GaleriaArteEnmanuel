<button id="btn-scroll-top" class="btn position-fixed" style="bottom: 20px; left: 20px; display: none; z-index: 999;" title="Volver al inicio de la pagina">
    ↑
</button>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const scrollBtn = document.getElementById('btn-scroll-top');

        window.addEventListener('scroll', () => {
            scrollBtn.style.display = window.scrollY > 200 ? 'block' : 'none';
        });

        scrollBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
