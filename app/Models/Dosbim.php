<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosbim extends Model
{
    use HasFactory;
    protected $table = "Dosbim";

    protected $fillable = [
        'nama_dosbim',
        'no_hp',
        'nidn',
        'id_user',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nama_dosbim', 'name');
    }
}
