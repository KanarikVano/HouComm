@extends('layouts/app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h2 class="card-title mb-4">История расчётов</h2>
        <a href="{{ route('calculations.create') }}" class="btn btn-primary mb-3">Создать новый расчёт</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Тариф</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th>Дата</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calculations as $calculation)
                    <tr>
                        <td>{{ $calculation->tariff->name }}</td>
                        <td>{{ $calculation->amount }}</td>
                        <td>{{ $calculation->total }} ₽</td>
                        <td>{{ $calculation->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection