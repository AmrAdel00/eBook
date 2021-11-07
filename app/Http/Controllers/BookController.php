<?php

namespace App\Http\Controllers;

use App\Helpers\File;
use App\Http\Requests\Book\BookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('user_id',auth()->id())->latest()->get();
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'info' => $request->info,
            'user_id' => auth()->id(),
            'category_id' => $request->category,
            'image' => File::store('image'),
            'file' => File::store('file'),
        ]);

        return redirect()->route('books.index')->with(['msg' => 'Book Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit',compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'info' => $request->info,
            'category_id' => $request->category,
        ]);

        return redirect()->route('books.show',$book->id)->with(['msg_update' => 'Book Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // Delete Image
        File::delete($book->image);

        // Delete File
        File::delete($book->file);

        // Delete Book
        $book->comments()->delete();
        $book->delete();

        return redirect()->route('books.index')->with(['msg' => 'Book Deleted Successfully']);
    }
}
