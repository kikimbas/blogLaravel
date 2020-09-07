@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">
                    All posts
                </h4>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>№</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>User id</th>
                            <th></th>
                        </tr>
                        @foreach($posts as $k=>$el)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td><b>{{$el->name}}</b></td>
                            <td>{{$el->description}}</td>
                            <td>{{$el->user_id}}</td>
                            <td><a href="{{route('post_edit', $el->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection