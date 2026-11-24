<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LamaranPekerjaan extends Model
{
    protected $table = 'lamaran_pekerjaan';

    protected $guarded = [];

    public function lowongan()
    {
        return $this->belongsTo(LowonganPekerjaan::class, 'lowongan_id');
    }
}

