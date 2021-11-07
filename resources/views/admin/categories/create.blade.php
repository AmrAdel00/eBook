@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')
<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="name" name="name">
      @error('name')
          <span class="text-danger">{{ $message }}<span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop