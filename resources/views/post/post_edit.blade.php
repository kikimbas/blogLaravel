@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">
                    Edit posts №{{$postId}}
                </h4>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{ route('post_edit', $postId) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="name" class="form-control" value="{{$post->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" required>{{$post->description}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection