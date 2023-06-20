<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        return view('kategori.index',[
            "kategori"=>Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
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
        Kategori::create($validateData);

        return redirect()->route('kategori.index')->with('status', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Books $book)
    // {
    //     $validateData = $request->validate([
    //         "judul"=>"required|string",
    //         "penulis"=>"required|string",
    //         "penerbit"=>"required|string",
    //         "stok"=>"required|integer",
    //         "harga"=>"required|integer",
    //     ]);
    //     $book->update($validateData);
      
        
    //     return redirect()->route('books.index')->with('sucess', 'data buku' . $validateData['judul'] . 'berhasil');
    // }

    /**
     * Remove the specified resource from storage.
     */

}
