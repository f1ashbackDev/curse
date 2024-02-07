@extends('new_admin.layout.admin')
@section('content')
    <h2>Добавление продукта на сайт</h2>
    <form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
          class="d-flex flex-column">
        @csrf
        <input type="text" placeholder="Название товара" name="name"/>
        <input type="number" placeholder="Цена товара" name="price"/>
        <input type="number" placeholder="Количество товара" name="count"/>
        <input type="text" placeholder="Описание товара" name="description"/>
        <label>
            Каталог:
            <select name="category">
                @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->categories_name}}</option>
                @endforeach
            </select>
        </label>
        <input multiple="multiple" name="image[]" type="file">
        {{--        // Добавить выбора категории товара--}}
        <input type="submit" placeholder="Создать"/>
    </form>
@endsection
