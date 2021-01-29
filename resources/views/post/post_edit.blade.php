@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($post)
                    <h4 class="card-header">
                        Изменить объект №{{$postId}}
                    </h4>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! Form::open() !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Название') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Описание') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Адрес') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('city_id', 'Город') !!}
                            {!! Form::text('city_id', $city, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Цена') !!}
                            {!! Form::text('price', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('currency', 'Валюта') !!}
                            {!! Form::text('currency', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('area', 'Площадь м2') !!}
                            {!! Form::text('area', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('floor', 'Этаж') !!}
                            {!! Form::text('floor', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('rooms_quantity', 'Количество комнат') !!}
                            {!! Form::text('rooms_quantity', null, ['class' => 'form-control']) !!}
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить</button>

                        {!! Form::close() !!}
                    </div>
                @else
                    <h4 class="card-header">
                        Не найден объект с таким ID
                    </h4>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection