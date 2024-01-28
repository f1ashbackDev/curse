@extends('new_admin.admin')
@section('content')
    <h2>Добавление продукта на сайт</h2>
    <form method="post" action="{{ route('createCategoriesAdmin') }}">
        @csrf
        <input type="text" placeholder="Название товара" name="name"/>
        <input type="number" placeholder="Цена товара" name="price"/>
        <input type="number" placeholder="Количество товара" name="count"/>
        <input type="text" placeholder="Описание товара" name="description"/>
        <input type="image" placeholder="Картинки товара" name="image"/>
{{--        // Добавить выбора категории товара--}}
        <input type="submit" placeholder="Создать"/>
    </form>
@endsection
