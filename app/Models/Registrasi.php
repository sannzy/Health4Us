<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasi';

    protected $fillable = [
        'user_id', 'tantangan_id', 'status', 'sudah_klaim_daftar', 'sudah_mengikuti_tantangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tantangan()
    {
        return $this->belongsTo(Tantangan::class, 'tantangan_id');
    }
}
