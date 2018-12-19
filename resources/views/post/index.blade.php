@extends('layouts.app')
@section('content')

    <h1 class="m-4">Posts</h1>

    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="well">

                    <div>
                        <h3><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>  
                    </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No posts found.</p>
    @endif

@endsection