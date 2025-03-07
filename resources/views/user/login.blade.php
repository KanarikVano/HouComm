@extends('layouts/app')

@section('content')
<div class="card shadow mx-auto" style="max-width: 400px;">
    <div class="card-body">
        <h2 class="card-title mb-4">Вход</h2>
        <form method="POST" action="{{ route('auth') }}">
            @csrf
            @if ($errors->any())
                <div class="bg-danger rounded-pill p-3">
                    @foreach($errors->all() as $error)
                        {{$error}}
                        <br>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Войти</button>
        </form>
    </div>
</div>
@endsection