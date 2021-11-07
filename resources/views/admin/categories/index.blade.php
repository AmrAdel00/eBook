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
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
          <th scope="row">{{ $category->id }}</th>
          <td>{{ $category->name }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop