@extends('new_admin.admin')
@section('content')
    <h2>Изменение пользователя:</h2>
    @foreach($user as $item)
        <p>Фамилия: {{$item->surname}}</p>
        <p>Имя: {{$item->name}}</p>
        <p>Логин: {{$item->login}}</p>
        <p>Почта: {{$item->email}}</p>
        <p>Роль: {{$item->role}}</p>
    @endforeach
@endsection
