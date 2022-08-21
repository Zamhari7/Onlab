<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aslab extends Model
{
    use HasFactory;

    protected $table = "Aslab";

    protected $fillable = [
        'nama_aslab',
        'nbi',
        'no_hp',
        'id_user',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'nama_aslab', 'name');
    }
}
