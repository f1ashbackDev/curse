@extends('pages.header')
@section('content')
    <section style="margin-bottom: 50px">
        <div class="container">
            <div style="width: 1250px;">
                <img src="{{ url(asset('img/test.jpg')) }}" style="display: block; max-width: 100%; height: auto; object-fit: fill">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr;
                            grid-gap: 20px; overflow-x: auto; white-space: nowrap">
                <div style="padding: 20px; display: flex;
                                align-items: center;
                                gap: 20px">
                    <div>
                        <img src="{{ url(asset('img/smail/block1.svg')) }}">
                    </div>
                    <div>
                        <div style="font-weight: 600">
                            100% Оригинальная продукция
                        </div>
                        от производителя
                    </div>
                </div>
                <div style="padding: 20px; display: flex;
                                align-items: center;
                                gap: 20px">
                    <div>
                        <img src="{{ url(asset('img/smail/block2.svg')) }}">
                    </div>
                    <div>
                        <div style="font-weight: 600">
                            Бесплатная доставка
                        </div>
                        по всему миру
                    </div>
                </div>
                <div style="padding: 20px; display: flex;
                                align-items: center;
                                gap: 20px">
                    <div>
                        <img src="{{ url(asset('img/smail/block3.svg')) }}">
                    </div>
                    <div>
                        <div style="font-weight: 600">
                            Скидки и подарки
                        </div>
                        нашим клиентам
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="margin-bottom: 50px">
        <div class="container text-center">
            <h3>Категории</h3>
            <div style="
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
                    grid-gap: 20px;
                    text-align: center">
                @if(count($category))
                    @foreach($category as $category_item)
                        <div style="
                                padding: 20px;
                                position: relative;
                                height: 100%;
                                width: 100%;
                                background-color: #fff;
                                border-radius: 5px;
                                box-shadow: 0 10px 20px -5px rgba(0,0,0,.2);">
                            <div>
                                <a href="{{ route('category.show', [$category_item]) }}">
                                    <img src="{{ asset('/storage/'. $category_item->image) }}" style="display: block; max-width: 100%; height: auto">
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('category.show', [$category_item]) }}">{{$category_item->categories_name}}</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>На данный момент категорий нет на сайте</p>
                @endif
            </div>
        </div>
        <div>
            <a href="{{ route('category') }}" style="padding: 8px 10px; display: block; border-radius: 5px; color: #333; margin: 2px auto 0; width: max-content">Все категории</a>
        </div>
    </section>
    <section>
        <div class="container text-center" style="margin-bottom: 50px;">
            <h3>Товары</h3>
            <div class="alert alert-primary notifOff" role="alert" id="alert">
                Товар добавлен в корзину
            </div>
            @if(count($products))
                <div style="display: flex; box-sizing: content-box;">
                    @foreach($products as $product_item)
                        <div style="width: 297.5px; margin-right: 20px;">
                            <div class="product_card" style="
                                    padding: 20px;
                                    position:relative;
                                    height: 100%;
                                    width: 100%;
                                    background-color: #fff;
                                    border-radius: 5px;
                                    box-shadow: 0 10px 20px -5px rgba(0,0,0,.2);
                                    text-align: start">
                                <div style="margin-bottom: 10px;">
                                    <a href="{{ route('products.show', $product_item) }}">
                                        <img src="{{ asset('/storage/'. $product_item->image[0]->image)}}" style="display: block; max-width: 100%; height: auto">
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
                                            <div style="
                                            display: flex;
                                            position: relative;
                                            text-align: center;
                                            background: rgba(25, 118, 210, .1);
                                            border-radius: 5px;
                                            flex: 1">
                                                <button class="product_card_buttons" onclick="del({{$product_item->id}})">-</button>
                                                <input placeholder="1" class="product_card_ammount" id="{{$product_item->id}}" value="1">
                                                <button class="product_card_buttons" onclick="add({{$product_item->id}})">+</button>
                                            </div>
                                            <a class="addCard" onclick="addCart({{$product_item->id}})">
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
                <div style="margin-bottom: 50px;">
                    <a href="{{ route('products') }}" style="text-decoration: none; padding: 8px 10px; display: block; border-radius: 5px; color: #333; margin: 10px auto 0; width: max-content">Все товары</a>
                </div>
            @else
                <p>Товаров нет</p>
            @endif
        </div>
    </section>
@endsection
@section('js-scripts')
    <script type="text/javascript">
        let csrf_token = document.head.querySelector('meta[name="csrf-token"]');
        let notif = document.getElementById('alert');
        let listCount = new Map();
        const add = (id) => {
            let input = document.getElementById(id);
            input.value++;
            listCount.set(id, input.value);
            console.log(listCount);
        }
        const del = (id) => {
            let input = document.getElementById(id);
            if(input.value > 1){
                input.value--;
                listCount.set(id, input.value);
                console.log(listCount);
            }
        }
        const addCart = (id) =>{
            const count = listCount.get(id)
            if ( typeof count != "undefined" )
            {
                return fetch(`/user/basket/${id}/store`,{
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
                        notif.classList.remove('notifOff');
                        setTimeout(()=>{
                            notif.classList.add('notifOff');
                        }, 1500)
                    }
                ).catch(
                    error => console.log(error)
                )
            }
            return listCount.set(id, 1)
        }
    </script>
@endsection
