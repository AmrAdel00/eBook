@extends('adminlte::page')

@section('title', 'Categories')
@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
<form method="POST" action="{{ route('categories.update',$category->id) }}">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? old('name') }}">
      @error('name')
          <span class="text-danger">{{ $message }}<span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop