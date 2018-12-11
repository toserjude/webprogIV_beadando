@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/webprogIV_beadando/public/post/create">Create post</a>
                    <h3>Your blog posts</h3>
                    @if (count($posts)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <th>{{$post->title}}</th>
                                    <th><a href="/webprogIV_beadando/public/post/{{$post->id}}/edit" class="btn btn-light">Edit</a></th>
                                    <th>{!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-light'])}}
                                        {!!Form::close()!!}</th>
                                </tr> 
                            @endforeach
                        </table>
                    @else 
                        <div>
                            You have no one post yet.
                        </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
