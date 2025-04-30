document.addEventListener('DOMContentLoaded', function () {
    const alertBox = document.getElementById('success-alert');
    if (alertBox) {
        setTimeout(() => {
            alertBox.classList.add('fade');
            alertBox.classList.remove('show');
            setTimeout(() => alertBox.remove(), 500);
        }, 3000);
    }
});

