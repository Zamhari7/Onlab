<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileTugas extends Model
{
    use HasFactory;
    protected $table = "file_tugas";

    protected $fillable = [
        'nama_file',
        'file_tugas',
        'tgl_upload',
        'nilai',
        'keterangan',
        'id_tugas',
        'id_kelas',
        'id_mahasiswa',

    ];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function tugas()
    {
        return $this->hasOne(Tugas::class, 'id', 'id_tugas');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa');
    }
}
