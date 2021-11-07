@extends('layouts.app')

@section('content')
<div class="container">
    <h3>All Books</h3>
    <hr/>
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
