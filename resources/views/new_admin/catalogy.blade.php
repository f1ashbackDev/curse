@extends('new_admin.admin')
@section('content')
    <div class="d-flex">
        <h2>Каталоги сайта</h2>
        <a class="m-2" href="{{route('showCreateCategoriesAdmin')}}">Добавить каталог</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Номер каталога</th>
            <th>Название каталога</th>
            <th>Действие</th>
        </tr>
        @foreach($category as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->categories_name}}</td>
                <td>
                    <a href="{{route('editCategories', ['id'=> $item->id])}}">Изменить</a>
                    <a href="{{ route('deleteCategories', ['id'=>$item->id]) }}">Удалить</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
