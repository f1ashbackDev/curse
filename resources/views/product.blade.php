@extends('pages.header')
@section('content')
    <section style="margin-bottom: 50px;">
        <div class="container">
            <h1>{{$product->name}}</h1>
            <div style="display: flex">
                <div style="padding: 20px;
                             position:relative;
                             height: 100%;
                             width: 70%;
                             box-shadow: 0 10px 20px -5px rgba(0,0,0,.2);
                             border-radius: 5px;
                             transition: box-shadow .3s,-webkit-box-shadow .3s;
                             text-align: start;
                             display: flex;
                             gap: 20px">
                    <div>
                        <div>
                            @foreach($image as $item)
                                <img src="{{  asset('/storage/' . $item->image)  }}" style="display: block;
                                                                                            max-width: 100%;
                                                                                            height: auto;
                                                                                            margin-bottom: 20px" id="imageSrc">
                                @break
                            @endforeach
                        </div>
                        <div style="display: flex; justify-content: center">
                            @foreach($image as $item)
                                <div style="width: 92.2px; margin-right: 10px">
                                    <img src="{{  asset('/storage/' . $item->image)  }}" style="display: block;
                                                                                            width: 62px;
                                                                                            height: 62px" id="{{$item->id}}" onclick="test({{$item->id}})">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div>
                            <p style="margin: 0 0 0 10px; font-size: 14px; color: #333333">{{ $product->description }}</p>
                            <p style="margin-bottom: 12px; font-size: 14px; color: #333333">Производитель</p>
                        </div>
                    </div>
                </div>
                <div  style="padding: 20px;
                             position:relative;
                             height: 100%;
                             width: 30%;
                             background-color: #fff;
                             border-radius: 5px;
                             box-shadow: 0 10px 20px -5px rgba(0,0,0,.2);
                             text-align: start;
                             margin-left: 20px">
                    @if($product->count > 0)
                        <div class="">
                            <p style="color: #5fa800">В наличии</p>
                            <p style="padding: 10px 0;
                            font-size: 30px;
                            margin-bottom: 15px;">{{ $product->price }} рублей</p>
                            @if(\Illuminate\Support\Facades\Auth::user())
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
                                        <button class="product_card_buttons" onclick="del({{$product->id}})">-</button>
                                        <input placeholder="1" class="product_card_ammount" id="{{$product->id}}">
                                        <button class="product_card_buttons" onclick="add({{$product->id}})">+</button>
                                    </div>
                                    <a class="addCard" onclick="addCart({{$product->id}})">
                                        В корзину
                                    </a>
                                </div>
                            @else
                                <div style="
                                display: flex;
                                flex-wrap: wrap;
                                gap: 10px">
                                    <p>Авторизуйтесь</p>
                                </div>
                            @endif

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-scripts')
    <script type="text/javascript">
        const test = (image) => {
            let clickedImage = document.getElementById(image);
            let changeImage = document.getElementById('imageSrc');
            changeImage.src = clickedImage.src;
        }
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
