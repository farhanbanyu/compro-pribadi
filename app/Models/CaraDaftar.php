<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaraDaftar extends Model
{
    protected $table = 'cara_daftar';

    protected $fillable = [
        'title',
        'description',
        'file',
    ];
}
