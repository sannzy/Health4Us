<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tantangan extends Model
{
    use HasFactory;
    protected $table = 'tantangan'; 

    protected $fillable = [
        'judul', 'slug', 'kategori', 'deskripsi', 'gambar', 'jarak', 'hadiah', 'tanggal', 'koin'
    ];

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'tantangan_id');
    }
}
