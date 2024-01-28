@extends('new_admin.admin')
@section('content')
    <h2>Создание нового каталога</h2>
    <form method="post" action="{{ route('createCategoriesAdmin') }}">
        @csrf
        <input type="text" placeholder="Название каталога" name="name"/>
        <input type="submit" placeholder="Создать"/>
    </form>
@endsection
