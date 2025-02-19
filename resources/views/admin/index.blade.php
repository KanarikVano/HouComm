@extends('layouts/app')

@section('content')
<div class="card shadow">
    <div class="card-body">
        <h2 class="card-title mb-4">Управление тарифами</h2>
        <a href="{{ route('admin.tariffs.create') }}" class="btn btn-primary mb-3">Добавить тариф</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Цена (₽)</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tariffs as $tariff)
                    <tr>
                        <td>{{ $tariff->name }}</td>
                        <td>{{ $tariff->price }}</td>
                        <td>
                            <a href="{{ route('admin.tariffs.edit', $tariff->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                            <form action="{{ route('admin.tariffs.destroy', $tariff->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection