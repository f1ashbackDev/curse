@extends('new_admin.layout.admin')
@section('content')
    <h2>Изменение продукта:</h2>
    <form method="post" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data"
          class="d-flex flex-column">
        @csrf
        <label>
            Текущее название: {{ $product->name }}
            <input type="text" placeholder="Введите новое название" name="name"/>
        </label>
        <label>
            Текущая цена: {{ $product->price }}
            <input type="number" placeholder="Цена товара" name="price"/>
        </label>
        <label>
            Количество на складе: {{ $product->count }}
            <input type="number" placeholder="Добавить кол-во" name="count"/>
        </label>
        <label>
            Текущее описание продукта: {{ $product->description }}
            <input type="text" placeholder="Новое описание продукта" name="description"/>
        </label>
        <label>
            Категория товара: {{ $name_category }}
            <select name="category">
                @foreach($category as $item)
                    <option value="{{$item->id}}">{{$item->categories_name}}</option>
                @endforeach
            </select>
        </label>
        <label>
            Текущие фотографии продукта:
            @foreach($image as $item)
                <img src="{{ asset('/storage/' . $item->image) }}" style="width: 250px; height: 250px"/>
            @endforeach
        </label>
        <input multiple="multiple" name="image[]" type="file">
        <input type="submit" placeholder="Создать"/>
    </form>
@endsection
