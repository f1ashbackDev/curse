@extends('new_admin.admin')
@section('content')
    <h2>Изменение пользователя:</h2>
    @foreach($user as $item)
        <form action="" method="post">
            <p>Фамилия: {{$item->surname}}</p>
            <p>Имя: {{$item->name}}</p>
            <p>Логин: {{$item->login}}</p>
            <p>Почта: {{$item->email}}</p>
            <p>Роль: </p>
            <select>
                <option value="Пользователь" @selected($item->role == 'Пользователь')>Пользователь</option>
                <option value="Менеджер" @selected($item->role == 'Менеджер')>Менеджер</option>
                <option value="Администратор" @selected($item->role == 'Администратор')>Администратор</option>
            </select>
            <input type="submit" value="Сохранить"/>
        </form>
    @endforeach
@endsection
