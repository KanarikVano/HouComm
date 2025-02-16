<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #e3f2fd;">
    <header class="border-bottom border-secondary p-3">
        <nav class="navbar navbar-light navbar-expand-md" style="background-color: #e3f2fd;">
            <div class="container-flud">
                <a class="navbar-brand" href="{{route('main')}}">
                        <img src="{{asset('car-front-fill.svg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Нарушениям.Нет
                </a>            
                <button class="navbar-toggler" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav">
                        @guest
                        <a href="{{route('login')}}" class="nav-link">Вход</a>
                        <a href="{{route('reg')}}" class="nav-link">Регистрация</a>
                        @endguest
                        @auth
                        <a href="{{route('client.index')}}" class="nav-link">Личный кабинет</a>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <input type="submit" class="nav-link" value="Выход">
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer class="sticky-bottom text-center text-secondary p-3">
        <div class="container-fluid">
            <span>Нарушениям.Нет <br>2024</span>
        </div>        
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>