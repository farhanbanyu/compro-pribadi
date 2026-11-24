<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuFooter extends Model
{
    protected $table = 'menu_footer';
    protected $guarded = [];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(CategoryFooter::class, 'category_id');
    }
}
