@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-end">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
    </div>
    @if (session()->has('msg'))
        <div class="alert alert-success">{{ session()->get('msg') }}</div>
    @endif
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('books.show',$book->id) }}">{{ $book->title }}</a></h5>
                    <p class="card-text">{{ $book->info }}</p>
                    <a href="{{ $book->file }}" class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        @endforeach   
    </div>
</div>
@endsection