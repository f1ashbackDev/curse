<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Автозапчасти</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/style.css'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="" style="width: auto">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logotip.svg" alt="" srcset="" style="width: 40px; height: 35px;">
                    Автозапчасти
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nav justify-content-end" id="navbarNavAltMarkup">
                    <form class="form-inline d-flex m-2">
                        <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                    </form>
                    @if(\Illuminate\Support\Facades\Auth::guard('user')->check())
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.html">Главная</a>
                        <a class="nav-link" href="#">Каталог</a>
                        <a class="nav-link">Профиль</a>
                    </div>
                    @else
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.html">Главная</a>
                        <a class="nav-link" href="#">Каталог</a>
                        <button type="button" class="nav-link" data-toggle="modal" data-target="#auth">
                            Войти
                        </button>
                        <button type="button" class="nav-link" data-toggle="modal" data-target="#register">
                            Регистрация
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
    <div>
        @yield('content')
    </div>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Присоединяйтесь к нам в соц сетях:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Автозапчасти
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Товары
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Акции</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Запчасти на автомобили</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            О нас
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">О компании</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Магазины</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>
    <!-- Footer -->
    <!--    modal auth -->
    <div class="modal fade" id="auth" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="exampleModalLongTitle">Авторизация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="d-flex flex-column align-items-center">
                        <label class="d-flex flex-column border-bottom mt-2">
                            Логин
                            <input type="text" pattern="[A-Za-zА-Яа-яЁё]"/>
                        </label>
                        <label class="d-flex flex-column border-bottom mt-2">
                            Пароль
                            <input type="password"/>
                        </label>
                        <button type="button" class="mt-2" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#resetPass">
                            Забыл пароль
                        </button>
                        <input class="mt-2 btn-auth" type="button" value="Войти">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--modal register-->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="registerTitle">Регистрация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="post" class="d-flex flex-column align-items-center">
                        @csrf
                        <label class="d-flex flex-column border-bottom mt-2">
                            Фамилия
                            <input type="text" name="surname"/>
                        </label>
                        <label class="d-flex flex-column border-bottom mt-2">
                            Имя
                            <input type="text" name="name"/>
                        </label>
                        <label class="d-flex flex-column border-bottom mt-2">
                            Логин
                            <input type="text" name="login"/>
                        </label>
                        <label class="d-flex flex-column border-bottom mt-2">
                            Почта
                            <input type="email" name="email"/>
                        </label>
                        <label class="d-flex flex-column border-bottom mt-2">
                            Пароль
                            <input type="password" name="password"/>
                        </label>
                        <label class="d-flex flex-column border-bottom mt-2">
                            Повторить пароль
                            <input type="password"/>
                        </label>
                        <input class="m-4 p-2" type="submit" value="Зарегистрироваться">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Reset Password-->
    <div class="modal fade" id="resetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto" id="resetPassTitle">Восстановление пароля</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="d-flex flex-column align-items-center">
                        <label class="d-flex flex-column border-bottom mt-2">
                            Почта
                            <input type="email"/>
                        </label>
                        <input class="m-4 p-2" type="button" value="Восстановить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
