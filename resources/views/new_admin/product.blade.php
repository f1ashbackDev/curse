@extends('new_admin.admin')
@section('content')
    <div class="d-flex">
        <h2>Товары сайта</h2>
        <a href="{{ route('showAddProduct') }}" class="m-2">Добавить товар</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Номер продукта</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество на складе</th>
                <th>Описание</th>
                <th>Каталог</th>
                <th>Фотографии</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->count}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->category->categories_name}}</td>
                    @if($item->image->count() > 0)
                        <td><img src="{{ asset('/storage/' . $item->image[0]->image) }}" style="width: 119px;
                        height: 67px"/></td>
                    @else
                        <td>Нет фотографии</td>
                    @endif
                    <td>
                        <a href="{{ route('editProduct', ['id' => $item->id]) }}">Изменить</a>
                        <a href="{{ route('deleteProduct', ['id' => $item->id]) }}">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
