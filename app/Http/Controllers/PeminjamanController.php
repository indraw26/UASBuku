<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        return view('books.index',[
            "book"=>Books::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "judul"=>"required|string",
            "penulis"=>"required|string",
            "penerbit"=>"required|string",
            "stok"=>"required|integer",
            "harga"=>"required|integer",
        ]);
        Books::create($validateData);

        return redirect()->route('books.index')->with('status', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {
  
        return view('books.edit')
       
        ->with('books',$book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
        $validateData = $request->validate([
            "judul"=>"required|string",
            "penulis"=>"required|string",
            "penerbit"=>"required|string",
            "stok"=>"required|integer",
            "harga"=>"required|integer",
        ]);
        $book->update($validateData);
      
        
        return redirect()->route('books.index')->with('sucess', 'data buku' . $validateData['judul'] . 'berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return back();
    }
}
