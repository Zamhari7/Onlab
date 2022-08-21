<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    use HasFactory;
    protected $table = "Praktikum";

    protected $fillable = [
        'nama_prak',
        'tahun_ajaran',
        'semester',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id', 'id_praktikum');
    }
}
