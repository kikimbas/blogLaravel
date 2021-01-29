@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">
                    Добавить объект
                </h4>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error  }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('add_object') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" id="name" name="name" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" id="address" name="address" class="form-control" value="" required>
                        </div>



                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="currency">Город</label>
                                    <select id="city_id" name="city_id" required class="form-control">
                                        @foreach($citys as $city)
                                            <option value="{{ $city->getId()  }}">{{ $city->getName()  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" id="price" name="price" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="currency">Валюта</label>
                                    <select id="currency" name="currency" class="form-control" required>
                                        <option value="UAH">UAH</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="area">Площадь м2</label>
                                    <input type="text" id="area" name="area" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="floor">Этаж</label>
                                    <input type="number" id="floor" name="floor" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rooms_quantity">Количество комнат</label>
                                    <input type="number" id="rooms_quantity" name="rooms_quantity" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{$userId}}">

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection