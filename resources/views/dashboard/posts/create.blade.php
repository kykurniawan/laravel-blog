@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form method="POST" action="/dashboard/posts" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}">
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id">
            @foreach($categories as $category)
            @if(old('category_id') == $category->id)
            <option selected value="{{$category->id}}">{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
        <input onchange="previewImage()" class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Body</label>
        <input id="body" type="hidden" name="body" value="{{old('body')}}">
        <trix-editor input="body" style="min-height: 400px;"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    const title = document.getElementById('title')
    const slug = document.getElementById('slug')

    title.addEventListener('change', () => {
        fetch('/dashboard/posts/create-slug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', (e) => {
        e.preventDefault()
    })

    function previewImage() {   
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')
        
        imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])
        oFReader.onload =  (oFREvent) => {
            imgPreview.src = oFREvent.target.result
        } 
    }
</script>
@endsection