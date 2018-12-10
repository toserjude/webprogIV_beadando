@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">{{$title}}</h1>
    <p class="lead">This is a laravel application from the "laravel from scratch" youtube series.</p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="#" role="button">Log In</a>
    <a class="btn btn-primary btn-lg" href="#" role="button">Register</a>
</div>
  
@endsection
