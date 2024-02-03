@extends('new_admin.admin')
@section('content')
    <div class="d-flex">
        <h2>Заказы</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Статус заказа</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $item)
            <tr>
                <td>
                    {{ $item->id }}
                </td>
                <td>
                    {{ $item->status }}
                </td>
                <td>
                    <a href="{{ route('showOrdersAdmin', ['id' => $item->id]) }}">Просмотр</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
