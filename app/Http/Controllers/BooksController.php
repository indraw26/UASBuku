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
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $book = Books::find($id);
        return view('books.edit',[
            "books"=>$book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validateData = $request->validate([
           'judul'=>'required|string', 
           'penulis'=>'required|string', 
           'penerbit'=>'required|string', 
           'stok'=>'required|numeric', 
           'harga'=>'required|numeric', 
        ]);

        $book = Books::find($id);
        if($validateData) {
            $book->update([
                "judul"=>$request->judul,
                "penulis"=>$request->penulis,
                "penerbit"=>$request->penerbit,
                "stok"=>$request->stok,
                "harga"=>$request->harga,
            ]);
        }
        return redirect('books')->with('Notification','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $buku=Books::find($id);
        if($buku) {
            $buku->delete();
        }
        return redirect()->back()->with('success', "Mahasiswa Berhasil Dihapus");
    }
}
