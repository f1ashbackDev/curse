@extends('new_admin.admin')
@section('content')
    <h2>Каталоги сайта</h2>
    <a href="{{route('showCreateCategoriesAdmin')}}">Добавить каталог</a>

    @foreach($category as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
        </tr>
    @endforeach
@endsection
