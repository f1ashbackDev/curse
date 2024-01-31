@extends('pages.header')
@section('content')
    <div class="container text-center" style="margin-top:30px">
        <h3>Скидки</h3>
        <div>
            <img src="..." class="img-thumbnail" alt="...">
        </div>
    </div>
    <div class="container text-center" style="margin-top: 30px">
        <h3>Товары</h3>
        <div class="d-flex justify-content-center" style="margin-top: 15px">
           @foreach($products as $item)
                <div class="card" style="width: 18rem; margin-right: 15px">
                    <img src="{{ asset('/storage/' . $item->image[0]->image) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Название товара: {{ $item->name }}</h5>
                        <p class="card-text">Цена: {{ $item->price }}</p>
                        <a href="{{ route('addBasket', ['id' => $item->id]) }}" class="btn btn-primary">В корзину</a>
                    </div>
                </div>
           @endforeach
        </div>
        <a class="btn">К остальным товарам</a>
    </div>
@endsection
