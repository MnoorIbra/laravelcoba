@extends('layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-5">{{ $post->title }}</h1>
            <h5 class="">{{$post['user']->name}}</h5>
        
        
            <p> By <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> In <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> </p>
            <!--exception ketika ada tag html di dalam body dengan menuliskan { !! }-->

            <img src="https://source.unsplash.com/1200x400?{{$post->category->name }}" alt="https://source.unsplash.com/500x400?{{$post->category->name }}" class="img-fluid">
                
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        
        
        <a href="/blog" class="d-block mt-3 btn btn-primary">Back to Posts</a>
        </div>
    </div>
</div>


 

@endsection