@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2>
            {{$post->title}}
        </h2>
        <p>By <a href="/posts?author={{$post->author->username}}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

        @if($post->image)
        <div style="max-height:400px; overflow:hidden;">
            <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->category->name}}" class="img-fluid w-100 mt-3">
        </div>
        @else
        <img src="https://source.unsplash.com/500x300?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid w-100 mt-3">
        @endif
        <article class="my-3">
            {!! $post->body !!}
        </article>
        <a href="/posts">Back to posts</a>
    </div>
</div>
@endsection