@extends('pages.header')
@section('content')
    <div class="container">
        <h2>Корзина пользователя</h2>
        @if(count($basket))
            <table class="table">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Стоимость</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($basket as $item)
                    @foreach($item->product as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('/storage/' . $item->productImage[0]->image) }}"
                                     style="width: 119px;
                                   height: 67px"/>
                            </td>
                            <td>{{$product->name}}</td>
                            <td id="product-{{$item->id}}">{{$product->price}}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="m-2" onclick="add({{$item->id}})">+</button>
                                    <p class="m-2" id="{{$item->id}}">{{$item->count}}</p>
                                    <button class="m-2" onclick="remove({{$item->id}})">-</button>
                                </div>
                            </td>
                            <td id="result-{{$item->id}}">{{ $product->price * $item->count }}</td>
                            <td>
                                <a href="{{ route('clearBasket', [$item->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('createOrder') }}" class="text-decoration-none">Перейти к оформлению</a>
        @else
            <p>Корзина пустая</p>
        @endif
    </div>
@endsection
@section('js-scripts')
    <script type="text/javascript">
        let csrf_token = document.head.querySelector('meta[name="csrf-token"]')
        const add = (id) => {
            const count = document.getElementById(id);
            const productSum = document.getElementById(`product-${id}`)
            const resultSum = document.getElementById(`result-${id}`)
            count.textContent++;
            resultSum.textContent = productSum.textContent * count.textContent
            fetch(`basket/update/${id}`,{
                method: 'post',
                body: JSON.stringify({
                    count: count.textContent
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
        const remove = (id) => {
            const count = document.getElementById(id);
            const productSum = document.getElementById(`product-${id}`)
            const resultSum = document.getElementById(`result-${id}`)
            if(count.textContent > 1){
                count.textContent--;
                resultSum.textContent = productSum.textContent / count.textContent
            }
            fetch(`basket/update/${id}`,{
                method: 'post',
                body: JSON.stringify({
                    count: count.textContent
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
    </script>
@endsection
