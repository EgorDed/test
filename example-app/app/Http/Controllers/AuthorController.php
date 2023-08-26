<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = DB::table('authors')->orderBy('id', 'desc')->paginate(15);
        return view("author.index", compact("authors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_author = $request->validate([
            'name' => '',
            'email' => '',
            'phone' => '',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=300,min_height=300',
        ]);



        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('authors', 'public');

            $path = explode('/', $path);

            DB::table('authors')->insert([
                'name' => $new_author['name'],
                'email' => $new_author['email'],
                'phone' => $new_author['phone'],
                'avatar' => $path[1],
            ]);
        }


        return redirect('/authors');

    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $books = DB::table('books')->where('author_id', '=', $author->id)->get();

        return view("author.show", compact("author", 'books'), );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view("author.edit", compact("author"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $FromDb = Author::find($author->id);

        $FromDb->name = $request->input('name');
        $FromDb->email = $request->input('email');
        $FromDb->phone = $request->input('phone');

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('authors', 'public');

            $path = explode('/', $path);
            $FromDb->avatar = $path[1];
        }



        $FromDb->save();



        return redirect('/authors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect('/authors');
    }
}