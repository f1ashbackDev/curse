@extends('new_admin.layout.admin')
@section('content')
    <h2>Создание нового каталога</h2>
    <form method="post" action="{{ route('admin.category.store') }}">
        @csrf
        <input type="text" placeholder="Название каталога" name="name"/>
        <input type="submit" placeholder="Создать"/>
    </form>
@endsection
