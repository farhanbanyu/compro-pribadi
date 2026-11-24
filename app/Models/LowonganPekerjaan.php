<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowonganPekerjaan extends Model
{
    protected $table = 'lowongan_pekerjaan';

    protected $guarded = [];

    public function lamaran()
    {
        return $this->hasMany(LamaranPekerjaan::class, 'lowongan_id');
    }
}

