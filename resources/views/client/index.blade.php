@extends('layouts/main_layout')

@section('content')
<div class="container p-3">
    <h1 class="text-center mb-3 display-3">Личный кабинет</h1>
    <p><span class="fw-semibold">Логин</span> {{$user->login}}</p>
    <div class="cards">
        @foreach ($apps as $app)
            @if($app->status == 1)
            <div class="card w-100 mb-3 mt-3">
                <div class="card-body">
                    <h5 class="card-title">Счет по ЖКХ №{{$app->id}}</h5>
                    <p class="mb-1"><span class="fw-semibold">Площадь:</span> {{$app->gosRegNumber}}</p>
                    <p class="mb-1"><span class="fw-semibold">Кол-во жильцов:</span> {{$app->gosRegNumber}}</p>
                    <p class="mb-1"><span class="fw-semibold">Холодная вода:</span> {{$app->gosRegNumber}}</p>
                    <p class="mb-1"><span class="fw-semibold">Горячая вода:</span> {{$app->gosRegNumber}}</p>
                    <p class="mb-1"><span class="fw-semibold">Отопление:</span> {{$app->gosRegNumber}}</p>
                    <p class="mb-1"><span class="fw-semibold">Электричество:</span> {{$app->gosRegNumber}}</p>
                    <p class="mb-1"><span class="fw-semibold">Итого:</span> {{$app->getStatus()}}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <a href="{{route('client.new_app')}}" class="btn btn-primary mb-3 mt-3 w-100 shadow-sm  p-3 fs-2 rounded-pill ">Подать заявление</a>
</div>
@endsection