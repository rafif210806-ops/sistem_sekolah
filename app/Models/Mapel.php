<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'MAPEL';

    protected $fillable = [
        'nama_mapel',
        'guru',
        'kelas'
    ];
}