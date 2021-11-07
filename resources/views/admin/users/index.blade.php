@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<div class="row">
    <div class="col-6">
        <h1>Users</h1>
    </div>
    <div class="col-6 d-flex justify-content-end">
        {{-- <a href="#" class="btn btn-primary my-2 pull-right">Add</a> --}}
    </div>
</div> 
@stop

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

