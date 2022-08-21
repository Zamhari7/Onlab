<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = "Nilai";

    protected $fillable = [
        'nilai_p1',
        'nilai_p2',
        'nilai_p3',
        'nilai_p4',
        'nilai_ujian',
        'nilai_dosen',
        'laporan',
        'id_mahasiswa',
        'id_kelas',
    ];

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'nama_mhs', 'name');
    // }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }
}
