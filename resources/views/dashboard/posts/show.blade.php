@extends('dashboard.layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-lg-8">
            <h1 class="mb-5">{{ $post->title }}</h1>
            <a href="/dashboard/posts" class=" btn btn-success mb-3"> <span data-feather="arrow-left"></span> Back to Posts </a>
            <a href="#" class=" btn btn-warning mb-3"> <span data-feather="edit"></span> Edit </a>
            <a href="#" class=" btn btn-danger mb-3"> <span data-feather="x-circle"></span> Delete </a>
            <!--exception ketika ada tag html di dalam body dengan menuliskan { !! }-->

            <img src="https://source.unsplash.com/1200x400?{{$post->category->name }}" alt="https://source.unsplash.com/500x400?{{$post->category->name }}" class="img-fluid">
                
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        
        
        
        </div>
    </div>
</div>

@endsection