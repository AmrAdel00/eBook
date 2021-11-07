@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
<div class="row">
    <div class="col-6">
        <h1>Categories</h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="{{ route('categories.create') }}" class="btn btn-primary my-2 pull-right">Add</a>
    </div>
</div> 
@stop

@section('content')
@if (session()->has('msg'))
    <div class="alert alert-success">{{ session()->get('msg') }}</div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
          <th scope="row">{{ $category->id }}</th>
          <td>{{ $category->name }}</td>
          <td>
            <div class="row">
              <div class="col-1">
                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary">Edit</a>
              </div>
              <div class="col-1">
                <form method="POST" action="{{ route('categories.destroy',$category->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop