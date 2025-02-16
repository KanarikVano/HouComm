@extends('layouts.app')

@section('content')
<div class="container">
    <h1>График расходов и прогнозирование</h1>
    <canvas id="myChart" width="400" height="200"></canvas>
</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = @json($labels);
    const data = @json($data);
    const futureDates = @json($futureDates);
    const futurePredictions = @json($futurePredictions);

    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [...labels, ...futureDates],
            datasets: [{
                label: 'Фактические расходы',
                data: [...data, ...Array(futureDates.length).fill(null)],
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false,
            }, {
                label: 'Прогнозируемые расходы',
                data: [...Array(labels.length).fill(null), ...futurePredictions],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderDash: [5, 5],
                fill: false,
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Дата'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Сумма (руб)'
                    }
                }
            }
        }
    });
</script>
@endsection