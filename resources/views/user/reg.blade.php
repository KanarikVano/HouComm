@extends('layouts/app')

@section('content')
<div class="card shadow mx-auto" style="max-width: 400px;">
    <div class="card-body">
        <h2 class="card-title mb-4">Регистрация</h2>
        <form method="POST" action="{{ route('register') }}">
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
                <label class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Подтвердите пароль</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Зарегистрироваться</button>
        </form>
    </div>
</div>
@endsection