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
                    data: [{{ $visualizaciones }}, {{ $usuarios }}],
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 159, 64, 0.5)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>


    <script>
        const paises = {!! json_encode($visitasPorPais->pluck('pais')) !!};
        const conteos = {!! json_encode($visitasPorPais->pluck('total')) !!};

        const ctxPaises = document.getElementById('paisChart').getContext('2d');
        new Chart(ctxPaises, {
            type: 'doughnut',
            data: {
                labels: paises,
                datasets: [{
                    label: 'Visitas',
                    data: conteos,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
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
