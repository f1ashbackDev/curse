@extends('pages.header')
@section('content')
    <div class="container">
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
            @if($errors->any)
                <p>{{ $errors->register }}</p>
            @endif

            <input class="m-4 p-2" type="submit" value="Зарегистрироваться">
        </form>
    </div>
@endsection
