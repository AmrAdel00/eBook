@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit {{ $book->title }}</h1>
    <form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title ?? old('title') }}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author ?? old('author') }}">
            @error('author')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="info" class="form-label">Info</label>
            <textarea class="form-control" id="info" rows="3" name="info">{{ $book->info ?? old('info')  }}</textarea>
            @error('info')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" id="category" name="category">
                <option selected></option>
                @foreach ($categories as $category)
                <option 
                    value="{{ $category->id }}" 
                    @if($book->category_id == $category->id )
                    selected
                    @endif
                >
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
        <button type="submit" class="btn btn-primary w-100">Save</button>
    </form>
</div>
@endsection