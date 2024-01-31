@extends('pages.header')
@section('content')
    <div class="container">
        <h2>Корзина пользователя</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Стоимость</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                @foreach($basket as $item)
                    @foreach($item->product as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/' . $item->productImage[0]->image) }}"
                                     style="width: 119px;
                                   height: 67px"/>
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$item->count}}</td>
                            <td>10</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
