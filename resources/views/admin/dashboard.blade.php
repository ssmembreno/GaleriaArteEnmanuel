@extends('_layouts.admin')

@section('dashboard')
    <div class="container">
        <h2>Dashboard</h2>

        <div class="row">
            <!-- Gráfico de resumen -->
            <div class="col-md-6 mb-4">
                <h5 class="text-center">Resumen</h5>
                <canvas id="graficoResumen" class="w-100" style="height: 300px;"></canvas>
            </div>

            <!-- Gráfico de visitas por país -->
            <div class="col-md-6 mb-4">
                <h5 class="text-center">Visitas por país</h5>
                <canvas id="paisChart" class="w-100" style="margin-left:20px; height: 100px;"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
const resumenCtx = document.getElementById('graficoResumen').getContext('2d');
const resumenChart = new Chart(resumenCtx, {
    type: 'bar',
    data: {
        labels: ['Visualizaciones', 'Usuarios'],
        datasets: [{
            label: 'Totales',
            data: [{{ $visualizaciones ?? 0 }}, {{ $usuarios ?? 0 }}],
            backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 159, 64, 0.5)'],
            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                suggestedMax: Math.max({{ $visualizaciones }}, {{ $usuarios }}) + 5
            }
        }
    }
});
    </script>


    <script>
        const paises = {!! json_encode($visitasPorPais->pluck('pais')) !!};
        const conteos = {!! json_encode($visitasPorPais->pluck('total')) !!};
        const backgroundColors = [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(199, 199, 199, 0.6)',
            'rgba(83, 102, 255, 0.6)',
            'rgba(255, 102, 255, 0.6)',
            'rgba(102, 255, 102, 0.6)',
            'rgba(255, 153, 102, 0.6)',
            'rgba(102, 204, 255, 0.6)',
            'rgba(204, 153, 255, 0.6)',
            'rgba(255, 255, 102, 0.6)',
            'rgba(255, 204, 204, 0.6)',
            'rgba(153, 255, 153, 0.6)',
            'rgba(102, 255, 255, 0.6)',
            'rgba(255, 102, 102, 0.6)',
            'rgba(153, 153, 255, 0.6)',
            'rgba(255, 153, 204, 0.6)',
            'rgba(0, 204, 153, 0.6)',
            'rgba(255, 204, 153, 0.6)',
            'rgba(255, 255, 153, 0.6)',
            'rgba(153, 204, 255, 0.6)',
            'rgba(255, 153, 153, 0.6)',
            'rgba(204, 255, 255, 0.6)',
            'rgba(255, 204, 255, 0.6)',
            'rgba(204, 204, 255, 0.6)',
            'rgba(153, 255, 204, 0.6)',
            'rgba(255, 255, 204, 0.6)',
            'rgba(204, 255, 153, 0.6)',
            'rgba(255, 255, 255, 0.6)',
            'rgba(128, 0, 0, 0.6)',
            'rgba(0, 128, 0, 0.6)',
            'rgba(0, 0, 128, 0.6)',
            'rgba(128, 128, 0, 0.6)',
            'rgba(128, 0, 128, 0.6)',
            'rgba(0, 128, 128, 0.6)',
            'rgba(192, 192, 192, 0.6)',
            'rgba(128, 128, 128, 0.6)',
            'rgba(0, 0, 0, 0.6)',
            'rgba(255, 0, 0, 0.6)',
            'rgba(0, 255, 0, 0.6)',
            'rgba(0, 0, 255, 0.6)',
            'rgba(255, 255, 0, 0.6)',
            'rgba(255, 0, 255, 0.6)',
            'rgba(0, 255, 255, 0.6)',
            'rgba(100, 100, 100, 0.6)',
            'rgba(150, 50, 200, 0.6)',
            'rgba(200, 150, 50, 0.6)'
        ];

        const ctxPaises = document.getElementById('paisChart').getContext('2d');
        new Chart(ctxPaises, {
            type: 'doughnut',
            data: {
                labels: paises,
                datasets: [{
                    label: 'Visitas',
                    data: conteos,
                    backgroundColor: backgroundColors.slice(0, paises.length),
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

    </script>
@endpush
