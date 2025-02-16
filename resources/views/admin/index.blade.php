@extends('layouts/main_layout')

@section('content')
<div class="container p-3">
    <h1 class="text-center mb-3 display-3">Панель администратора</h1>
    <div class="cards">
        @foreach($apps as $app)
        @if ($app->status == 1)
        <div class="card w-100 mb-3 mt-3">
            <div class="card-body">
                <h5 class="card-title">Нарушение №{{$app->id}}</h5>
                <p class="mb-1"><span class="fw-semibold">Фамилия:</span> {{$app->user->firstname}}</p>
                <p class="mb-1"><span class="fw-semibold">Имя:</span> {{$app->user->lastname}}</p>
                <p class="mb-1"><span class="fw-semibold">Отчество:</span> {{$app->user->surname}}</p>
                <p class="mb-1"><span class="fw-semibold">Статус:</span> {{$app->user->getStatus()}}</p>
                <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> {{$app->user->gosRegNumber}}</p>
                <p class="card-text">{{$app->description}}</p>
                <div class="d-flex align-items-center justify-content-between cards_btn">
                    <form action="{{route('app.repair', ['id'=>$app->id])}}" method="post">
                        @csrf
                        @method('PATCH');
                        <input type="submit" value="Подтвердить" class="card-link btn btn-primary my-3 shadow-sm  p-3 px-5 rounded-pill">Подтвердить</input>
                    </form>
                    <form action="{{route('app.repair', ['id'=>$app->id])}}" method="post">
                        @csrf
                        @method('PATCH');
                        <input type="submit" value="Отменить" class="card-link btn btn-outline-primary mb-3 mt-3 shadow-sm p-3 px-5 rounded-pill m-0 ">Отменить</input>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if ($app->status == 2)
        <div class="card w-100 mb-3 mt-3 bg-warning-subtle text-warning-emphasis border-warning-subtle">
            <div class="card-body">
                <h5 class="card-title">Нарушение №{{$app->id}}</h5>
                <p class="mb-1"><span class="fw-semibold">Фамилия:</span> {{$app->user->firstname}}</p>
                <p class="mb-1"><span class="fw-semibold">Имя:</span> {{$app->user->lastname}}</p>
                <p class="mb-1"><span class="fw-semibold">Отчество:</span> {{$app->user->surname}}</p>
                <!-- <p class="mb-1"><span class="fw-semibold">Статус:</span> {{$app->user->getStatus()}}</p> -->
                <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> {{$app->user->gosRegNumber}}</p>
                <p class="card-text">{{$app->description}}</p>
                <div class="d-flex align-items-center justify-content-between cards_btn">
                    <form action="{{route('app.repair', ['id'=>$app->id])}}" method="post">
                        @csrf
                        @method('PATCH');
                        <input type="submit" value="Подтвердить" class="card-link btn btn-primary my-3 shadow-sm  p-3 px-5 rounded-pill">Подтвердить</input>
                    </form>
                    <form action="{{route('app.repair', ['id'=>$app->id])}}" method="post">
                        @csrf
                        @method('PATCH');
                        <input type="submit" value="Отменить" class="card-link btn btn-outline-primary mb-3 mt-3 shadow-sm p-3 px-5 rounded-pill m-0 ">Отменить</input>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if ($app->status == 3)
        <div class="card w-100 mb-3 mt-3 bg-warning-subtle text-warning-emphasis border-warning-subtle">
            <div class="card-body">
                <h5 class="card-title">Нарушение №{{$app->id}}</h5>
                <p class="mb-1"><span class="fw-semibold">Фамилия:</span> {{$app->user->firstname}}</p>
                <p class="mb-1"><span class="fw-semibold">Имя:</span> {{$app->user->lastname}}</p>
                <p class="mb-1"><span class="fw-semibold">Отчество:</span> {{$app->user->surname}}</p>
                <!-- <p class="mb-1"><span class="fw-semibold">Статус:</span> {{$app->user->getStatus()}}</p> -->
                <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> {{$app->user->gosRegNumber}}</p>
                <p class="card-text">{{$app->description}}</p>
                <div class="d-flex align-items-center justify-content-between cards_btn">
                    <form action="{{route('app.repair', ['id'=>$app->id])}}" method="post">
                        @csrf
                        @method('PATCH');
                        <input type="submit" value="Подтвердить" class="card-link btn btn-primary my-3 shadow-sm  p-3 px-5 rounded-pill">Подтвердить</input>
                    </form>
                    <form action="{{route('app.repair', ['id'=>$app->id])}}" method="post">
                        @csrf
                        @method('PATCH');
                        <input type="submit" value="Отменить" class="card-link btn btn-outline-primary mb-3 mt-3 shadow-sm p-3 px-5 rounded-pill m-0 ">Отменить</input>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection