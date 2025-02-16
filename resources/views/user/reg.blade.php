@extends('layouts/main_layout')

@section('content')
    <div class="container p-3">
        <h1 class="text-center md-3 display-3">Регистрация</h1>
        <form action="{{route('user.store')}}" method="post" class="m-auto">
        @csrf
            @if ($errors->any())
                <div class="bg-danger rounded p-3 text-white fs-5">
                    @foreach($errors->all() as $error)
                        {{$error}}
                        <br>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">
                <label for="login" class="form-label fs-5">Логин</label>
                <input type="text" class="form-control shadow-sm  p-3 rounded-pill" id="login" name="login">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-5">Пароль</label>
                <input type="password" class="form-control shadow-sm  p-3 rounded-pill" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password-repeat" class="form-label fs-5">Повторите пароль</label>
                <input type="password" class="form-control shadow-sm  p-3 rounded-pill" id="password-repeat" name="password-repeat">
            </div>
            <input type="submit" class="btn btn-primary mb-3 mt-3 w-100 shadow-sm  p-3 fs-2 rounded-pill " value="Зарегистрироваться">
            <a href="{{route('login')}}" class="btn btn-outline-primary  w-100 p-3 fs-2 rounded-pill shadow-sm">Войти</a>
        </form>
    </div>
@endsection