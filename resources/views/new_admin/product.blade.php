@extends('new_admin.admin')
@section('content')
    <div class="d-flex">
        <h2>Товары сайта</h2>
        <a href="{{ route('showAddProduct') }}">Добавить товар</a>
    </div>
    <p>{{$products}}</p>


    <p>{{ $image }}</p>


    <table>
        <tr>
            <th>Номер продукта</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Каталог</th>
            <th>Фотографии</th>
            <th>Действие</th>
        </tr>
        @foreach($products as $item)
            @foreach($image as $item_img)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->count}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->getCategory->categories_name}}</td>
                    <td>{{$item_img->image}}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
@endsection
