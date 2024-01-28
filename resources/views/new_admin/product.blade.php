@extends('new_admin.admin')
@section('content')
    <div class="d-flex">
        <h2>Товары сайта</h2>
        <a href="{{ route('showAddProduct') }}">Добавить товар</a>
    </div>

    <table>
        <tr>
            <th>Номер продукта</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Номер каталога</th>
            <th>Действие</th>
        </tr>
        @foreach($products as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->count}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->category_id}}</td>
                <td>
                    <a href="{{route('showUpdateUser', ['id'=> $item->id])}}">Изменить</a>
                </td>
                <td>
                    <a href="{{ route('deleteCategories', ['id'=>$item->id]) }}">Удалить</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
