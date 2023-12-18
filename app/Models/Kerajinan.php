<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerajinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_user',
        'id_kategori',
        'judul',
        'bahan_bahan',
        'langkah_langkah',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
