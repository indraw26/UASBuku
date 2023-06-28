<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Books;
use App\Models\Peminjamanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $data['books'] = Books::all()->count();
        $data['kategoris'] = Kategori::all()->count();
        $data['peminjamanans'] = Peminjamanan::all()->count();
        $data['peminjamankategori'] = DB::select('SELECT k.kategori, COUNT(*) as jumlah, b.judul
        FROM peminjamanans p
        JOIN kategoris k ON p.kategori_id = k.id
        JOIN books b on p.book_id =b.id
        GROUP BY k.kategori,b.judul');
    
    return view('dashboardapp', $data);

    }
}