@extends('layouts/app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h2 class="card-title mb-4">Новый расчёт</h2>
        <form action="{{ route('calculations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Тариф</label>
                <select name="tariff_id" class="form-select">
                    @foreach($tariffs as $tariff)
                    <option value="{{ $tariff->id }}">{{ $tariff->name }} ({{ $tariff->price }} ₽/ед.)</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Количество</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Рассчитать</button>
        </form>
    </div>
</div>
@endsection