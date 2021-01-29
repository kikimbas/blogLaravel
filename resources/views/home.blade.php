@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">
                    Congratulation, <b>{{ $user->name }}</b> <br/>
                    You are logged in!
                </h4>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>
                            <a href="{{ route('profile-view') }}">Изменить профиль</a>
                        </li>
                        <li>
                            <a href="{{route('view_form')}}">Добавить объект</a>
                        </li>
                        <li>
                            <a href="{{route('list_post')}}">Список объектов</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection