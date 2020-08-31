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
                            <a href="{{ route('profile') }}">Edit profile</a>
                        </li>
                        <li>
                            <a href="">Remove profile</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection