@extends('pages.header')
@section('content')
    <div class="container" style="margin-bottom: 50px">
        <h2 style="margin-bottom: 30px; font-size: 36px">Корзина</h2>
        @if(count($basket))
            <div class="d-flex">
                <div class = "basket">
                    @foreach($basket as $item)
                        <div class="basket_card" style="">
                            <div style="width: 13%">
                                @foreach($item->productImage as $image)
                                    <img src="{{ asset('/storage/' . $image->image) }}" style="display: block; max-width: 100%; height: auto">
                                    @break
                                @endforeach
                            </div>
                            @foreach($item->product as $product)
                                <div style="width: 47%">
                                    <p style="font-weight: 500; color: #000;">{{ $product->name }}</p>
                                </div>
                                <div style="width: 15%; text-align: center">
                                    <div style="
                                            display: flex;
                                            position: relative;
                                            text-align: center;
                                            background: rgba(25, 118, 210, .1);
                                            border-radius: 5px;
                                            flex: 1;
                                            height: 38px;
                                            margin-bottom: 5px;">
                                        <button class="product_card_buttons" onclick="add({{$item->id}})">+</button>
                                        <input placeholder="{{ $item->count }}" class="product_card_ammount" id="{{$item->id}}" value="{{ $item->count }}">
                                        <button class="product_card_buttons" onclick="del({{$item->id}})">-</button>
                                    </div>
                                    <p id="product-{{$item->id}}" style="font-weight: 400">{{ $product->price  }}</p>
                                </div>
                            @endforeach
                            <div style="width: 25%; text-align: right">
                                <p id="result-{{$item->id}}" style="font-weight: 400">{{ $item->product_sum }}</p>
                                <a href="{{ route('basket.delete', $item) }}">Удалить товар</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="width: 26%; padding-left: 30px;
                            margin-bottom: 30px;
                            font-size: 18px;
                            border-radius: 2px;">
                   <div style="padding: 15px 18px;
                   background-color: rgba(255,255,255, 1)">
                       <h4 style="border-bottom: 1px solid rgba(0,0,0, .05);
                       margin-bottom: 15px;
                       padding: 0 18px 15px 18px;
                       margin-left: -18px;
                       margin-right: -18px;
                       font-size: 20px">Ваш заказ</h4>
                       <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; margin-bottom: 10px">
                           <p style="font-size: 18px">Товары:</p>
                           <p style="font-size: 18px">500 р</p>
                       </div>
                       <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; margin-bottom: 10px">
                           <p style="font-size: 18px">Доставка:</p>
                           <p style="font-size: 18px">0 р.</p>
                       </div>
                       <div style="border-top: 1px solid rgba(0,0,0, .05); padding-top: 15px; margin-top: 15px; margin-bottom: 15px; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between;">
                           <p style="font-size: 23px">Итого:</p>
                           <p style="font-size: 23px">500 р</p>
                       </div>
                       <a href="">Оформить</a>
                   </div>
                </div>
            </div>
        @else
            <p>Корзина пустая. <a href="{{ route('products') }}">Перейти к покупкам.</a></p>
        @endif
    </div>
@endsection
@section('js-scripts')
    <script type="text/javascript">
        let csrf_token = document.head.querySelector('meta[name="csrf-token"]')
        const add = (id) => {
            const input = document.getElementById(id);
            const productSum = document.getElementById(`product-${id}`);
            const resultSum = document.getElementById(`result-${id}`);
            input.value++;
            resultSum.textContent = productSum.textContent * input.value;
            return fetch(`basket/${id}/update`,{
                        method: 'post',
                        body: JSON.stringify({
                            count: input.value
                        }),
                        headers: {
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": csrf_token.content
                        }
                    }).then(
                        response => {
                        }
                    ).catch(
                        error => console.log(error)
                    )
        }
        const remove = (id) => {
            const input = document.getElementById(id);
            const productSum = document.getElementById(`product-${id}`);
            const resultSum = document.getElementById(`result-${id}`);
            if(input > 0){
                input.value++;
                resultSum.textContent = productSum.textContent * input.value;
                return fetch(`basket/${id}/update`,{
                    method: 'post',
                    body: JSON.stringify({
                        count: input.value
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrf_token.content
                    }
                }).then(
                    response => {
                    }
                ).catch(
                    error => console.log(error)
                )
            }
        }
        // const add = (id) => {
        //     const count = document.getElementById(id);
        //     const productSum = document.getElementById(`products-${id}`)
        //     const resultSum = document.getElementById(`result-${id}`)
        //     count.textContent++;
        //     resultSum.textContent = productSum.textContent * count.textContent
        //     fetch(`basket/${id}/update`,{
        //         method: 'post',
        //         body: JSON.stringify({
        //             count: count.textContent
        //         }),
        //         headers: {
        //             'Content-Type': 'application/json',
        //             "X-CSRF-Token": csrf_token.content
        //         }
        //     }).then(
        //         response => {
        //             return console.log(response)
        //         }
        //     ).catch(
        //         error => console.log(error)
        //     )
        // }
        // const remove = (id) => {
        //     const count = document.getElementById(id);
        //     const productSum = document.getElementById(`products-${id}`)
        //     const resultSum = document.getElementById(`result-${id}`)
        //     if(count.textContent > 1){
        //         count.textContent--;
        //         resultSum.textContent = productSum.textContent / count.textContent
        //     }
        //     fetch(`basket/update/${id}`,{
        //         method: 'post',
        //         body: JSON.stringify({
        //             count: count.textContent
        //         }),
        //         headers: {
        //             'Content-Type': 'application/json',
        //             "X-CSRF-Token": csrf_token.content
        //         }
        //     }).then(
        //         response => {
        //             return console.log(response)
        //         }
        //     ).catch(
        //         error => console.log(error)
        //     )
        // }
    </script>
@endsection
