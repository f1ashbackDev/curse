@extends('pages.header')
@section('content')
    <div class="container w-auto bg-white" style="margin-top:32px; border: 1px solid #fff; border-radius: 32px">
        <div class="d-flex justify-content-center">
            <div style="margin-right: 25px; margin-top: 20px; margin-bottom: 20px;">
                @foreach($image as $item)
                    <i style="display: block; width: 60px; height: 60px; margin-bottom: 20px;">
                        <img src="{{ asset('/storage/' . $item->image) }}" style="max-width: 100%; height: auto;"/>
                    </i>
                @endforeach
            </div>
            <div style="margin-right: 25px; margin-top: 20px; margin-bottom: 20px;">
                <img src="{{ asset('/storage/' . $item->image) }}" style="max-width: 100%; height: auto"/>
            </div>
            <div class="" style="margin-top: 25px;">
                <h2>{{$product->name}}</h2>
                <p class="">В наличие</p>
                <p class="">Цена: {{$product->price}}</p>
                <p class="">Описание продукта:</p>
                <p>{{$product->description}}</p>
                <form method="post" action="{{ route('basket.store', $product) }}">
                    @csrf
                    <label>
                        Количество
                        <input type="number" placeholder="1" value="1" name="count"/>
                    </label>
                    <button type="submit">Купить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
