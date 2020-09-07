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
                    {!! Form::open() !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Title') !!}
                        {!! Form::text('name',null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description',null, ['class' => 'form-control']) !!}
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection