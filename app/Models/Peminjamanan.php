<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class Peminjamanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['user_id','book_id','kategori_id','lamaPinjam'];
    public function books() {
        return $this->BelongsTo(Books::class,'book_id','id');
    }

    public function user() {
        return $this->BelongsTo(User::class,'user_id','id');
    }

    public function kategori() {
        return $this->BelongsTo(Kategori::class,'kategori_id','id');
    }
}
