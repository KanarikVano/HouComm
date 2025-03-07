@extends('layouts/app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h2 class="card-title mb-4">Добавить тариф</h2>
        <form action="{{ route('admin.tariffs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Цена (₽)</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
</div>
@endsection