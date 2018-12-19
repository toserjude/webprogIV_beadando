@extends('layouts.app')
@section('content')
    <a href="{{route('post.index')}}" class="btn btn-light">Go Back</a>
    <h1>{{$post->title}}</h1>
    <hr>
    <div> 
        {!!$post->body!!}
    </div>
    <hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
@endsection