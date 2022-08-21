<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "Mahasiswa";

    protected $fillable = [
        'nama_mhs',
        'nbi',
        'id_user',
        'id_praktikum',
        'id_kelas',
        'id_dosbim',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nama_mhs', 'name');
    }

    public function praktikum()
    {
        return $this->hasMany(Praktikum::class, 'id', 'id_praktikum');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function dosbim()
    {
        return $this->hasOne(Dosbim::class, 'id', 'id_dosbim');
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'id_mahasiswa', 'id');
    }
}
