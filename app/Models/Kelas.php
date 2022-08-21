<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "Kelas";

    // public function allData()
    // {
    //     return DB::table('kelas')
    //         ->join('praktikum', 'kelas.id_prak', '=', 'praktikum.id')
    //         ->first();
    // }

    protected $fillable = [
        'nama_kelas',
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id', 'id_kelas');
    }

    public function Tugas()
    {
        return $this->hasMany(Tugas::class, 'id_kelas', 'id');
    }

    public function fileTugas()
    {
        return $this->hasMany(fileTugas::class, 'id_kelas', 'id');
    }
}
