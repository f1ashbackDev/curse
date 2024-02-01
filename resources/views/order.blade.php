@extends('pages.header')
@section('content')
    <div class="container">
        @foreach($order as $item)
            <p>Номер заказа: {{ $item->id }}</p>
            <p>Статус заказа: {{ $item->status }}</p>
            <p>Сумма заказа: {{ $item->price }}</p>
        @endforeach
    </div>
@endsection
