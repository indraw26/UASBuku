<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
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
            "kategori"=>"required|string",
        ]);
        Kategori::create($validateData);

        return redirect()->route('kategori.index')->with('status', 'Kategori created successfully');
    }

    /**
     * Display the specified resource.
     */

    public function edit(String $id)
    {
        $category = Kategori::find($id);
        return view('kategori/edit',[
            "category"=>$category
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $kategori = Kategori::find($id);

        $validateData = $request->validate([
            'kategori'=>"required|string"
        ]);
        if ($kategori && $validateData) {
            $kategori->update([
                'kategori'=>$request->kategori
            ]);
        }
        
        return redirect()->route('kategori.index')->with('status', 'Data Kategori ' . $validateData['kategori'] . ' Berhasil Diedit');
    }

    public function destroy(String $id)
    {
        $kategori=Kategori::find($id);
        if($kategori) {
            $kategori->delete();
        }
        return redirect()->back()->with('success', "Mahasiswa Berhasil Dihapus");
    }
}
