<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title')</title>

    <!-- Fonts -->
    <link
        href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet">


    @vite(['resources/css/app.css'])
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3">Start Bootstrap</a>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link">Товары</a>
                    <a class="nav-link">Категории</a>
{{--                    <a class="nav-link" href="index.html">--}}
{{--                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>--}}
{{--                        Главная страница--}}
{{--                    </a>--}}
{{--                    <div class="sb-sidenav-menu-heading">Товары</div>--}}
{{--                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">--}}
{{--                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>--}}
{{--                        Категории--}}
{{--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">--}}
{{--                        <nav class="sb-sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link" href="{{route('categoryAddPage')}}">Добавить</a>--}}
{{--                            <a class="nav-link" href="{{route('categoryPage')}}">Просмотр</a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">--}}
{{--                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>--}}
{{--                        Продукты--}}
{{--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">--}}
{{--                        <nav class="sb-sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link" href="{{route('productAddPage')}}">Добавить</a>--}}
{{--                            <a class="nav-link" href="{{route('productPage')}}">Просмотр</a>--}}
{{--                            <a class="nav-link" href="{{route('commentPage')}}">--}}
{{--                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>--}}
{{--                                Отзывы--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        @yield('content')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
