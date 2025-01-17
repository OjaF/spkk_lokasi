<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    public $fillable = [
        'id_alternatif',
        'role',
        'id_kriteria',
        'nilai'
    ];
}
