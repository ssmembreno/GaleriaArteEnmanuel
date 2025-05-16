
<!-- Módulo de errores -->
@foreach($errors->all() as $error)
    <div class="custom-alert alert-error">
        <i class="fas fa-exclamation-circle"></i> {{ $error }}
    </div>
@endforeach

<!-- Módulo de éxito -->
@if(session('success'))
    <div class="custom-alert alert-success" id="success-alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<style>
    .custom-alert {
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        animation: fadeIn 0.4s ease-in-out;
    }

    .alert-error {
        background-color: #ffe1e1;
        color: #d93025;
        border-left: 4px solid #d93025;
    }

    .alert-success {
        background-color: #e0ffe8;
        color: #0f9d58;
        border-left: 4px solid #0f9d58;
    }

    .custom-alert i {
        font-size: 18px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-5px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<script>
    setTimeout(() => {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) successAlert.style.display = 'none';
    }, 4000);
</script>
