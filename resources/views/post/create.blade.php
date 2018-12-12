@extends('layouts.app')
@section('content')

    <h1>Create post</h1>
    {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' =>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'New Post')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' =>'New Post'])}}   
        </div>
        <div class="form-group">
            {{Form::file('cover-image')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-light'])}}
    {!! Form::close() !!}

@endsection