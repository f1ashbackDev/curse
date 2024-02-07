@extends('new_admin.layout.admin')
@section('content')
    <h2>Изменение каталога:</h2>
    <p>{{$catalogs->categories_name}}</p>
    <form action="{{ route('admin.category.update', $catalogs) }}" method="post">
        @csrf
        <input name="name" placeholder="Напишите новое название категории:" type="text"/>
        <input type="submit" placeholder="Сохранить"/>
    </form>
@endsection
