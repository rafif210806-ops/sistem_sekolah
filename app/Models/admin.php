<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'ADMIN';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'USERNAME',
        'PASSWORD'
    ];
}