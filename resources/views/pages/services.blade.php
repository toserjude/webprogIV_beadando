@extends('layouts.app')

@section('content')
    <h1 class="m-4">{{$title}}</h1>
    <article>
        <section>
            <h3>Some dummy text</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin, neque eu vehicula condimentum,
                justo sem hendrerit ipsum, sit amet gravida purus augue vel nisl. Etiam sed sem magna. Pellentesque iaculis
                dui eget velit suscipit, vitae convallis quam gravida. Vestibulum est dui, elementum id blandit ac, 
                dapibus vel leo. Aenean id convallis ex. Nullam pharetra faucibus quam vitae porttitor. 
                Phasellus finibus risus et est ornare tincidunt. Pellentesque vitae dapibus ex, non sollicitudin quam. 
                Donec in congue nisi. Vivamus vel elementum nulla.
            </p>
        </section>
        <section>
            @if (count($services) > 0)
                <ul class="list-group">
                @foreach ($services as $service)
                <li class="list-group-item">{{$service}}</li>
                @endforeach
                </ul>
            @endif
        </section>
    </article>


@endsection
