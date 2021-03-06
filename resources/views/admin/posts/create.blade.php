@extends('layouts.admin')

@section('content')
    <h2>Create a new Post</h2> 
    @include('partials.error')

    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group my-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="titleHelp" value="{{old('title')}}">
            <small id="titleHelp" class="form-text text-muted">Type the post title, max: 150 charachters</small>
        </div>

        <div class="form-group my-3">
            <label for="cover_image">Cover Image</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" aria-describedby="cover_imageHelp">
            <small id="cover_imageHelp" class="form-text text-muted">Upload you cover image</small>
        </div>

        <label for="category_id">Category</label>
        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id" id="category_id">
            <option selected>Choose Category...</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}" @if (old('category_id') == $category->id) selected="selected" @endif>{{$category->name}}</option>  
            @endforeach
        </select>
        <small id="categoryHelp" class="form-text text-muted my-3">Select post's category</small>

        <label for="tags">Tags</label>
        <select class="form-select @error('tags') is-invalid @enderror" multiple aria-label="tags" name="tags[]" id="tags">
            <option selected>Choose tags</option>
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
            <small id="tagsHelp" class="form-text text-muted my-3">Select post's tags</small>

        </select>

        <div class="form-group my-3">
            <label for="content">Content</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" aria-describedby="contentHelp" value="{{old('content')}}">
            <small id="contentHelp" class="form-text text-muted">Type the cover image link</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection