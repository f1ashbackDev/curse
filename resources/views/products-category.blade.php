@extends('pages.header')
@section('content')
    <section>
        <div class="container" style="margin-bottom: 50px; margin-top: 50px;">
            <h3>{{ $category_name }}</h3>
            @if(count($products))
                <div style="display: grid;
                        grid-template-columns: 0fr 0fr 0fr;
                        justify-content: center;">
                    @foreach($products as $product_item)
                        <div style="width: 297.5px; margin-right: 20px; margin-bottom: 20px;">
                            <div class="product_card" style="
                                    padding: 20px;
                                    position:relative;
                                    height: 100%;
                                    width: 100%;
                                    background-color: #fff;
                                    border-radius: 5px;
                                    transition: box-shadow .3s,-webkit-box-shadow .3s;
                                    text-align: start;">
                                <div style="margin-bottom: 10px;">
                                    <a href="{{ route('product.show', $product_item) }}">
                                        @foreach($product_item->image as $image)
                                            <img src="{{ asset('/storage/'. $image->image)}}" style="display: block; max-width: 100%; height: auto">
                                            @break
                                        @endforeach

                                    </a>
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="{{ route('product.show', $product_item) }}"><h4 style="color: black">{{$product_item->name}}</h4></a>
                                    @if($product_item->count > 0)
                                        <p style="color: #5fa800">В наличии</p>
                                        <p style="padding: 10px 0">{{$product_item->price}}</p>
                                        <div style="
                                        display: flex;
                                        flex-wrap: wrap;
                                        gap: 10px">
                                            <div style="
                                            display: flex;
                                            position: relative;
                                            text-align: center;
                                            background: rgba(25, 118, 210, .1);
                                            border-radius: 5px;
                                            flex: 1">
                                                <button class="product_card_buttons">-</button>
                                                <input placeholder="1" class="product_card_ammount">
                                                <button class="product_card_buttons">+</button>
                                            </div>
                                            <a class="addCard">
                                                В корзину
                                            </a>
                                        </div>
                                    @else
                                        <p style="color: #e34545">Нет в наличии</p>
                                        <p style="padding: 10px 0">{{$product_item->price}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
