@extends('layouts/main_layout')

@section('content')
    <div class="container p-3">
        <h1 class="text-center mb-3 display-3">Калькулятор расчёта коммунальных платежей</h1>
        @if ($errors->any())
            <div class="bg-danger rounded-pill text-white fs-5 p-3">
                @foreach($errors->all() as $error)
                {{$error}}
                <br>
                @endforeach
            </div>
        @endif
        <form action="{{route('client.store')}}" method="post" class="m-auto">
        @csrf
        <div class="mb-3">
            <label for="square_meters" class="form-label fs-5">Площадь</label>
            <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="gosRegNumber" name="gosRegNumber">
        </div>
        <div class="mb-3">
            <label for="number_of_residents" class="form-label fs-5">Кол-во жителей</label>
            <textarea class="form-control shadow-sm  p-3 rounded-5" id="description" rows="5" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="cold_water" class="form-label fs-5">Холодная вода</label>
            <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="gosRegNumber" name="gosRegNumber">
        </div>
        <div class="mb-3">
            <label for="water_drainage" class="form-label fs-5">Водоотведение</label>
            <textarea class="form-control shadow-sm  p-3 rounded-5" id="description" rows="5" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="hot_water" class="form-label fs-5">Горячая вода</label>
            <textarea class="form-control shadow-sm  p-3 rounded-5" id="description" rows="5" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="heating" class="form-label fs-5">Отопление</label>
            <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="gosRegNumber" name="gosRegNumber">
        </div>
        <div class="mb-3">
            <label for="electricity" class="form-label fs-5">Электричество</label>
            <textarea class="form-control shadow-sm  p-3 rounded-5" id="description" rows="5" name="description"></textarea>
        </div>
        <input type="submit" class="btn btn-primary mb-3 mt-3 w-100 shadow-sm  p-3 fs-2 rounded-pill" value="Подать заявление">
        </form>
    </div>
@endsection