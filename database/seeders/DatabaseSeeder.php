<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Books;
use App\Models\Kategori;
use App\Models\Peminjamanan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Books::create([
            'id'=>"1",
            "judul"=>"Pemprogramman Web",
            "Penulis"=>"Usman",
            "Penerbit"=>"UMDP",
            "stok"=>"2",
            "harga"=>1000
        ]);

        Books::create([
            'id'=>"2",
            "judul"=>"Dunia Modern Tanpa Teknologi",
            "Penulis"=>"Indra",
            "Penerbit"=>"UMDP",
            "stok"=>"5",
            "harga"=>2000
        ]);

        Kategori::create([
            "id"=>"1",
            "kategori"=>"Romantis"
        ]);
        
        Kategori::create([
            "id"=>"2",
            "kategori"=>"Horror"
        ]);

        User::create([
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "password"=>"admin"
        ]);

        Peminjamanan::create([
            'user_id'=>"1",
            "book_id"=>"1",
            "kategori_id"=>"1",
            'lamaPinjam'=>3
        ]);
    }
}
