<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = "Tugas";

    protected $fillable = [
        'nama_tugas',
        'tipe',
        'tugas',
        'file',
        'nama_file',
        'mulai',
        'selesai',
    ];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function fileTugas()
    {
        return $this->hasMany(fileTugas::class, 'id_tugas', 'id');
    }
}
