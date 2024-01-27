@extends('admins.layout.admin')
@section('content')
    <p>Hewhhashdsah</p>
    <p>fsad;a;dsa</p>
    @foreach($category as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
        </tr>
    @endforeach
@endsection
