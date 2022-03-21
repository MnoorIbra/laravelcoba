@extends('layout.main')

@section('container')
<h1 class="mb-5"> Posts Category : {{ $category }}</h1>
    @foreach($posts as $pos)
    <article>
        <h2>
            <a href="/posts/{{ $pos->slug }}">{{$pos->title}}</a>
        </h2>
        <h5>By: {{$pos["author"]}}</h5>
        <p>{{$pos->excerpt}}</p>
        </article>
    @endforeach
    
@endsection