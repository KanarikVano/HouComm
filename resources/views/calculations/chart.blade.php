@extends('layouts/app')

@section('content')
<div class="container">
    <h1>График расходов и прогнозирование</h1>
    <canvas id="myChart" width="800" height="400"></canvas>
</div>

@push('scripts')
<script>
    // Функция для получения данных с сервера
    async function fetchChartData() {
        const response = await fetch('{{ route("calculations.data") }}');
        const data = await response.json();
        return data;
    }

    // Функция для отрисовки графика
    function drawChart(labels, data) {
        const canvas = document.getElementById('myChart');
        const ctx = canvas.getContext('2d');
        const width = canvas.width;
        const height = canvas.height;
        const padding = 40;

        // Очистка canvas
        ctx.clearRect(0, 0, width, height);

        // Настройки осей
        const xAxisLength = width - 2 * padding;
        const yAxisLength = height - 2 * padding;
        const xAxisY = height - padding;
        const yAxisX = padding;

        // Отрисовка осей
        ctx.beginPath();
        ctx.moveTo(yAxisX, padding);
        ctx.lineTo(yAxisX, xAxisY);
        ctx.lineTo(width - padding, xAxisY);
        ctx.strokeStyle = '#000';
        ctx.stroke();

        // Отрисовка меток на оси X
        const xStep = xAxisLength / (labels.length - 1);
        ctx.textAlign = 'center';
        ctx.textBaseline = 'top';
        labels.forEach((label, index) => {
            const x = yAxisX + index * xStep;
            ctx.fillText(label, x, xAxisY + 10);
        });

        // Отрисовка меток на оси Y
        const maxData = Math.max(...data);
        const yStep = yAxisLength / 5;
        ctx.textAlign = 'right';
        ctx.textBaseline = 'middle';
        for (let i = 0; i <= 5; i++) {
            const y = xAxisY - i * yStep;
            const value = (maxData / 5) * i;
            ctx.fillText(value.toFixed(2), yAxisX - 10, y);
        }

        // Отрисовка графика
        ctx.beginPath();
        ctx.strokeStyle = '#007bff';
        ctx.lineWidth = 2;
        data.forEach((value, index) => {
            const x = yAxisX + index * xStep;
            const y = xAxisY - (value / maxData) * yAxisLength;
            if (index === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        });
        ctx.stroke();

         // Добавление точек и подсказок
        data.forEach((value, index) => {
            const x = yAxisX + index * xStep;
            const y = xAxisY - (value / maxData) * yAxisLength;

            // Отрисовка точки
            ctx.beginPath();
            ctx.arc(x, y, 5, 0, 2 * Math.PI);
            ctx.fillStyle = '#007bff';
            ctx.fill();

            // Подсказка при наведении
            canvas.addEventListener('mousemove', (event) => {
                const rect = canvas.getBoundingClientRect();
                const mouseX = event.clientX - rect.left;
                const mouseY = event.clientY - rect.top;

                if (Math.abs(mouseX - x) < 10 && Math.abs(mouseY - y) < 10) {
                    ctx.fillStyle = '#000';
                    ctx.fillText(`₽${value.toFixed(2)}`, x + 10, y - 10);
                }
            });
        });
    }

    // Основная функция
    async function initChart() {
        const { labels, data } = await fetchChartData();
        drawChart(labels, data);
    }

    // Запуск при загрузке страницы
    document.addEventListener('DOMContentLoaded', initChart);
</script>
@endpush
@endsection