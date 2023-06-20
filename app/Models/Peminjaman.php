<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    
    protected $guarded =['id'];
    protected $fillable = ['judul','penulis','penerbit','stok','harga'];
}
