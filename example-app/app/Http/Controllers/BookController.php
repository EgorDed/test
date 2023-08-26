<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books = DB::table('books')->orderBy('id', 'desc')->paginate(15);
        return view("book.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = DB::table('authors')->orderBy('id', 'desc')->select("id", "name")->get();

        return view('book.create', compact("authors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('books')->insert([
            'name' => $request->input("name"),
            'price' => $request->input("price"),
            'author_id' => $request->input("author"),
            'description' => $request->input("description"),
        ]);



        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = DB::table('books')->where('id', '=', $id)->first();

        $author = DB::table('authors')->select('name')->where('id', '=', $book->author_id)->first();

        return view("book.show", compact("author", 'book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors_list = DB::table('authors')->where('id', '!=', $book->author_id)->orderBy('id', 'desc')->get();

        $current_author = DB::table('authors')->where('id', '=', $book->author_id)->first();

        return view("book.edit", compact("book", 'authors_list', "current_author"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $FromDb = Book::find($book->id);

        $FromDb->name = $request->input('name');
        $FromDb->price = $request->input('price');
        $FromDb->description = $request->input('description');
        $FromDb->author_id = $request->input("author");





        $FromDb->save();



        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }
}