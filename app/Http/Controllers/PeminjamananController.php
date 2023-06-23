<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Kategori;
use App\Models\Peminjamanan;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PeminjamananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $carts = Cart::with(['product'])->where(['user_id' => Session::get('pelanggan')->id])->get();
        $peminjaman = Peminjamanan::with(['books','kategori'])->where(['user_id'=>Auth::user()->id])->get();
        return view('peminjaman.index',[
            'peminjaman'=>$peminjaman
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Books::all();
        $kategori = Kategori::all();
        return view('peminjaman.create',[
            'books'=>$books,
            'kategori'=>$kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_id'=>'required|string',
            'kategori_id'=>'required|string',
            'lamaPinjam'=>'required|numeric',
        ]);
        $validatedData['user_id']=Auth::user()->id;
        if($validatedData) {
            Peminjamanan::create($validatedData);
        }
        return redirect('peminjaman');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjamanan $peminjamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $peminjaman= Peminjamanan::find($id);
        $books= Books::all();
        $kategori= Kategori::all();
        return view('peminjaman.edit',[
            'peminjaman'=>$peminjaman,
            'books'=>$books,
            'kategori'=>$kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $peminjaman =Peminjamanan::find($id);
        $validatedData = $request->validate([
            'book_id'=>'required|string',
            'kategori_id'=>'required|string',
            'lamaPinjam'=>'required|numeric',
        ]);
        if($validatedData && $peminjaman) {
            $peminjaman->update([
                'books_id'=>$request->books_id,
                'kategori_id'=>$request->kategori_id,
                'lamaPinjam'=>$request->lamaPinjam
            ]);
        }
        return redirect('peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $peminjaman=Peminjamanan::find($id);
        if($peminjaman){
            $peminjaman->delete();
        }
        return back()->with('status','Data Berhasil Dihapus');
    }
}
