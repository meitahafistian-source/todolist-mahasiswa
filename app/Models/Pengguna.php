<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna';

    protected $fillable = [
        'nama_pengguna',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}