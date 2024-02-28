@extends('pages.header')
@section('content')
    <section style="margin-bottom: 50px;">
        <div class="container">
            <h3>Каталог</h3>
            <div style="
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr;
                    justify-content: center;
                    grid-gap: 20px;
                    width: 915px;
                    margin: 0 auto;
                    text-align: center">
                @if(count($category))
                    @foreach($category as $category_item)
                        <div>
                            <div style="
                                padding: 20px;
                                position: relative;
                                height: 100%;
                                width: 100%;
                                background-color: #fff;
                                border-radius: 5px;
                                transition: box-shadow .3s,-webkit-box-shadow .3s">
                                <div>
                                    <a href="{{ route('category', [$category_item]) }}" style="text-decoration: none; color: #333333">
                                        <img src="{{ asset('/storage/'. $category_item->image) }}" style="display: block; max-width: 100%; height: auto">
                                    </a>
                                </div>
                                <div style="padding-top: 15px">
                                    <a href="{{ route('category', [$category_item]) }}" style="text-decoration: none; color: #333333">{{$category_item->categories_name}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>На данный момент категорий нет на сайте</p>
                @endif
            </div>
        </div>
    </section>
@endsection
