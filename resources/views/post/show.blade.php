@extends('layouts.app');
@section('content')
    <a href="/webprogIV_beadando/public/post/" class="btn btn-light">Go Back</a>
    <h1>{{$post->title}}</h1>
    <hr>
    <div> 
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    <a href="/webprogIV_beadando/public/post/{{$post->id}}/edit" class="btn btn-light">Edit post</a>
    {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-dark'])}}
    {!!Form::close()!!}
@endsection