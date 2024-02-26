@extends('pages.header')
@section('content')
    <div class="container " style="margin-top: 30px">
        <div class="d-grid" style="grid-template-columns: repeat(3, 300px); grid-column-gap: 24px; grid-row-gap: 24px; grid-gap: 16px; justify-content: center">
            @foreach($products as $item)
                <div style="min-height: 416px; width: 282px; position: relative; border: 1px solid #808080; border-radius: 10px">
                    <a href="{{ route('product.show', $item->id) }}" style="text-decoration: none; color: black">
                        @foreach($item->image as $image)
                            <img src="{{ asset('/storage/' . $image->image) }}" style=" width: 220px; height: 220px; max-width: 220px; min-height: 220px; object-fit: fill; margin-left: 30px;" alt="Товар"/>
                            @break
                        @endforeach
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
        <div class="d-flex justify-content-center align-items-center mt-3">
            <ul class="pagination">
                {{$products->links()}}
            </ul>
        </div>
    </div>
@endsection
