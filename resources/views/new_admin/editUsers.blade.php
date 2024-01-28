@extends('new_admin.admin')
@section('content')
    <h2>Изменение пользователя:</h2>
    @foreach($user as $item)
        <form action="" method="post">
            <p>Фамилия: {{$item->surname}}</p>
            <p>Имя: {{$item->name}}</p>
            <p>Логин: {{$item->login}}</p>
            <p>Почта: {{$item->email}}</p>
            <p>Роль: {{$item->role}}</p>
            <select>
                <option value="Пользователь">Пользователь</option>
                <option value="Менеджер">Менеджер</option>
                <option value="Администратор">Администратор</option>
            </select>
            <input type="submit" value="Сохранить"/>
        </form>
    @endforeach
@endsection
