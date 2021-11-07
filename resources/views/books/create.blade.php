@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="email" class="form-control" id="title" name="title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="email" class="form-control" id="author" name="author">
            @error('author')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="info" class="form-label">Info</label>
            <textarea class="form-control" id="info" rows="3" name="info"></textarea>
            @error('info')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" id="category" name="category">
                <option selected></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control form-control-lg" id="image" type="file" name="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>   
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input class="form-control form-control-lg" id="file" type="file" name="file">
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>     
        <button type="submit" class="btn btn-primary w-100">Save</button>
    </form>
</div>
@endsection