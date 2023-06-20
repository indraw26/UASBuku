<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Books;
use App\Models\Kategori;
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
            "judul"=>"PAW INDAH",
            "Penulis"=>"Usman",
            "Penerbit"=>"UMDP",
            "stok"=>"2",
            "harga"=>1000
        ]);

        Kategori::create([
            "id"=>"1",
            "kategori"=>"romantis"
        ]);
    }
}
