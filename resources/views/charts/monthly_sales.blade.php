@extends('layout.base')

@section('content')
    @include('includes.sidebar')

    <main class="wrap-content">

        @include('includes.appbar')
        <br><br><br>
        <h2 style="text-align: center">Statistiques de ventes mensuelles</h2>

        <div class="d-grid-2">
            @foreach ($months as $monthNum => $monthName)
                <div>
                    <h3>{{ $monthName }}</h3>
                    <canvas id="chart-{{ $monthNum }}" width="" height="" style=""></canvas>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx{{ $monthNum }} = document.getElementById('chart-{{ $monthNum }}').getContext('2d');
                        const chart{{ $monthNum }} = new Chart(ctx{{ $monthNum }}, {
                            type: 'bar',
                            data: {
                                labels: @json($monthlySalesData[$monthName]->pluck('minimum')),
                                datasets: [{
                                    label: 'Sales',
                                    data: @json($monthlySalesData[$monthName]->pluck('total')),
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>
            @endforeach
        </div>
        <script src="{{ URL::asset('assets/chart/chart.min.js') }}"></script>
    </main>
@endsection
