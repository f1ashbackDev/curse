@extends('new_admin.admin')
@section('content')
    <div class="d-flex">
        <h2>Заказ №{{$orders->id}}</h2>
    </div>
    <p>Статус заказа: {{ $orders->status }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>Название продукта</th>
                <th>Цена товара</th>
                <th>Количество товара</th>
                <th>Сумма</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItem as $item)
                @foreach($item->product as $product)
                    <tr>
                        <td>
                            <a href="#">{{$product->name}}</a>
                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$item->count}}</td>
                        <td>{{$item->sum}}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
