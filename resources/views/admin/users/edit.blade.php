@extends('adminlte::page')

@section('title', 'Categories')
@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
<form method="POST" action="{{ route('users.update',$user->id) }}">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? old('name') }}">
      @error('name')
          <span class="text-danger">{{ $message }}<span>
      @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email ?? old('email') }}">
        @error('email')
            <span class="text-danger">{{ $message }}<span>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop