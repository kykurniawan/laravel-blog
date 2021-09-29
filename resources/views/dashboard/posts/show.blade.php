@extends('dashboard.layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-8 my-4">
        <h2>
            {{$post->title}}
        </h2>
        <a href="/dashboard/posts" class="btn btn-success btn-sm">
            <span data-feather="arrow-left"></span>
            Back to my post
        </a>
        <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-warning btn-sm">
            <span data-feather="edit"></span>
            Edit
        </a>
        <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
        </form>
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