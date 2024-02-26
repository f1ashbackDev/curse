@extends('pages.header')
@section('content')
    <div class="container text-center w-auto bg-white" style="margin-top:32px; border: 1px solid #fff; border-radius: 32px">
        <div style="padding: 32px;">
            <h3>Категории</h3>
            @if(count($category))
                <div class="d-flex flex-wrap" style="grid-gap: 16px; justify-content: center">
                    @foreach($category as $cat)
                        <a href="{{ route('category', [$cat]) }}" style="display: block; width: 220px; height: 220px; background-color: #ff9000; border-radius: 20px; margin: 10px 20px">
                            <div>
                                <p style="font-size: 20px; line-height: 24px; color: #fbfff0; padding-top: 2px; word-wrap: break-word;
                                    word-break: break-all; margin: 0">{{ $cat->categories_name }}</p>
                                <img src="{{ asset('/storage/' . $cat->image) }}" style="width: 110px; height: 100px; margin-top: 30px"/>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p style="margin-top: 24px;">На данный момент категорий нет на сайте</p>
            @endif
        </div>
    </div>
    <div class="container w-auto bg-white" style="margin-top:32px; border: 1px solid #fff; border-radius: 32px">
        <div style="padding: 32px; margin-bottom: 15px;">
            <h3 class="text-center">Товары</h3>
            @if(count($products))
                <div class="d-grid" style="grid-template-columns: repeat(3, 300px); grid-column-gap: 24px; grid-row-gap: 24px; grid-gap: 16px; justify-content: center">
                    @foreach($products as $item)
                        <div style="min-height: 416px; width: 282px; position: relative; border: 1px solid #808080; border-radius: 10px">
                            <a href="{{ route('product.show', $item->id) }}" style="text-decoration: none; color: black">
                                <img src="{{ asset('/storage/' . $item->image[0]->image) }}" style=" width: 220px; height: 220px; max-width: 220px; min-height: 220px; object-fit: fill; margin-left: 30px;" alt="Товар"/>
                                <div style="padding: 16px;">
                                    <h4>{{ $item->name }}</h4>
                                    <p style="color: #797c83">{{ $item->category->categories_name }}</p>
                                </div>
                                <p style="position: absolute; bottom: 20px; left: 11px">{{ $item->price }}</p>
                            </a>
                            <a style="position: absolute; bottom: 35px; right: 11px">В корзину</a>
                        </div>
                    @endforeach
                </div>
                <a class="btn">К остальным товарам</a>
            @else
                <p style="margin-top: 24px;">На данный момент товаров нет на сайте</p>
            @endif
        </div>
    </div>
@endsection
