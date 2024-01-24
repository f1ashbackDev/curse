@extends('pages.header')
@section('content')
    <div class="container text-center" style="margin-top: 30px">
        <h3>Товары</h3>
        <div class="d-flex justify-content-center" style="margin-top: 15px">
            <div class="card" style="width: 18rem; margin-right: 15px">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Название товара</h5>
                    <p class="card-text">Оценки: 1 из 5</p>
                    <p class="card-text">Цена: </p>
                    <a href="#" class="btn btn-primary">К товару</a>
                </div>
            </div>
            <div class="card" style="width: 18rem; margin-right: 15px">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Название товара</h5>
                    <p class="card-text">Оценки: 1 из 5</p>
                    <p class="card-text">Цена: </p>
                    <a href="#" class="btn btn-primary">К товару</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Название товара</h5>
                    <p class="card-text">Оценки: 1 из 5</p>
                    <p class="card-text">Цена: </p>
                    <a href="#" class="btn btn-primary">К товару</a>
                </div>
            </div>
        </div>
        <a class="btn">К остальным товарам</a>
@endsection
