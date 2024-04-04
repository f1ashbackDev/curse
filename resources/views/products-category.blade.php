@extends('pages.header')
@section('content')
    <section>
        <div class="container" style="margin-bottom: 50px; margin-top: 50px;">
            <h3>{{ $category_name }}</h3>
            <p>{{$products}}</p>
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
                                    box-shadow: 0 10px 20px -5px rgba(0,0,0,.2);
                                    text-align: start;">
                                <div style="margin-bottom: 10px;">
                                    <a href="{{ route('products.show', $product_item) }}">
                                        @foreach($product_item->image as $image)
                                            <img src="{{ asset('/storage/'. $image->image)}}" style="display: block; max-width: 100%; height: auto">
                                            @break
                                        @endforeach

                                    </a>
                                </div>
                                <div>
                                    <a class="text-decoration-none" href="{{ route('products.show', $product_item) }}"><h4 style="color: black">{{$product_item->name}}</h4></a>
                                    @if($product_item->count > 0)
                                        <p style="color: #5fa800">В наличии</p>
                                        <p style="padding: 10px 0">{{$product_item->price}}</p>
                                        <div style="
                                        display: flex;
                                        flex-wrap: wrap;
                                        gap: 10px">
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                <div style="
                                            display: flex;
                                            position: relative;
                                            text-align: center;
                                            background: rgba(25, 118, 210, .1);
                                            border-radius: 5px;
                                            flex: 1">
                                                    <button class="product_card_buttons" onclick="del({{$product_item->id}})">-</button>
                                                    <input placeholder="1" class="product_card_ammount" id="{{$product_item->id}}">
                                                    <button class="product_card_buttons" onclick="add({{$product_item->id}})">+</button>
                                                </div>
                                                <a class="addCard" onclick="addCart({{$product_item->id}})">
                                                    В корзину
                                                </a>
                                            @else
                                                <p>Авторизуйтесь</p>
                                            @endif
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
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <ul class="pagination">
                        {{$products->links()}}
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('js-scripts')
    <script type="text/javascript">
        let csrf_token = document.head.querySelector('meta[name="csrf-token"]');
        let listCount = new Map();
        const add = (id) => {
            let input = document.getElementById(id);
            input.placeholder++;
            listCount.set(id, input.placeholder);
            console.log(listCount);
        }
        const del = (id) => {
            let input = document.getElementById(id);
            input.placeholder--;
            listCount.set(id, input.placeholder);
            console.log(listCount);
        }
        const addCart = (id) =>{
            const count = listCount.get(id)
            if ( typeof count != "undefined" )
            {
                return fetch(`user/basket/${id}/store`,{
                    method: 'post',
                    body: JSON.stringify({
                        count: count
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrf_token.content
                    }
                }).then(
                    response => {
                        return console.log(response)
                    }
                ).catch(
                    error => console.log(error)
                )
            }
            return listCount.set(id, 1)
        }
    </script>
@endsection
