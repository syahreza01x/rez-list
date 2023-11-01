<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lis extends Model
{
    use HasFactory;

    protected $table = 'lis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_anime',
        'id_user',
        'judul',
        'sinopsis',
        'studio',
        'genre',
        'gambar',
        'status'

    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
