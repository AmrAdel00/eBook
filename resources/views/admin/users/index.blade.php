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
@if (session()->has('msg'))
    <div class="alert alert-success">{{ session()->get('msg') }}</div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <div class="row">
              <div class="col-2">
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">Edit</a>
              </div>
              @if(auth()->id() != $user->id)
              <div class="col-2">
                <form method="POST" action="{{ route('users.destroy',$user->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
              @endif
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

