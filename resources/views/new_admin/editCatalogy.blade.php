@extends('new_admin.admin')
@section('content')
    <h2>Изменение каталога:</h2>
    @foreach($categories as $item)
        <p>Название категории: {{$item->name}}</p>
    @endforeach
    <form action="{{ route('updateCategories', [$categories[0]->id]) }}" method="post">
        @csrf
        <input name="name" placeholder="Напишите новое название категории:" type="text"/>
        <input type="submit" placeholder="Сохранить"/>
    </form>
@endsection
