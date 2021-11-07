@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('msg_update'))
        <div class="alert alert-success">{{ session()->get('msg_update') }}</div>
    @endif
    @if($book->user_id == auth()->id())
    <div class="d-flex justify-content-end">
        <a href="{{ route('books.edit',$book->id) }}" class="btn btn-primary m-2">Edit</a>
        <form method="POST" action="{{ route('books.destroy',$book->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger m-2">Delete</button>
        </form>
    </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h1>{{ $book->title }}</h1>
            <p><span class="fw-bold">Author: </span>{{ $book->author }}</p>
            <p>{{ $book->info }}</p>
        </div>  
        <div class="col-6">
            <img src="{{ $book->image }}" class="img-thumbnail" style="height: 300px;max-width:100%"/>
        </div>  
    </div>
    <hr/>
    <h5 class="text-center">Comments</h5>
    <hr/>
    @if (session()->has('msg'))
        <div class="alert alert-success">{{ session()->get('msg') }}</div>
    @endif
    <ul class="list-group list-group-flush">
        @foreach ($book->comments as $comment)
        <li class="list-group-item">
            <p class="fw-bold">{{ $comment->user->name }}</p>
            <p>{{ $comment->body }}</p>
            <p class="fw-light">{{ $comment->created_at->diffForHumans() }}</p>
        </li>
        @endforeach
    </ul>
    <hr/>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf   
        <div class="mb-3">
            <label for="comment" class="form-label">Add Comment</label>
            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
        </div>
        <input type="hidden" name="book_id" value="{{ $book->id }}"/>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection