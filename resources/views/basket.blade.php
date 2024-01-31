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
                    <th></th>
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
                            <td>
                                <a href="{{ route('clearBasket', [$item->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <a href="#" class="text-decoration-none">Перейти к оформлению</a>
    </div>
@endsection
