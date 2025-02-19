@extends('layouts/app')

@section('content')
    <div class="cover-container w-100 h-100 p-3 mx-auto text-center">
        <main class="px-3">
            <h1>Добро пожаловать в калькулятор коммунальных платежей!</h1>
            <p class="lead">
            С помощью нашего калькулятора вы сможете легко рассчитать стоимость коммунальных услуг: электроэнергии, воды, газа, отопления и других. Просто введите данные, и калькулятор автоматически произведет расчет.
            </p>
            <p class="lead">
                <a href="{{ route('login') }}" class="btn btn-outline-success fs-2 my-3 shadow-sm p-3 px-5 rouded-pill">
                    Войти и начать расчёт
                </a>
            </p>
        </main>
    </div>
@endsection