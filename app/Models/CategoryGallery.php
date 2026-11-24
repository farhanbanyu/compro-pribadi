<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    protected $table  = "categories";
    protected $guarded = [];

    public $timestamps = false;

    public static function Data()
    {
        return self::where([
            ['type', '=', 'gallery'],
            ['visible', '=', 'yes'],
        ])->orderBy('order', 'desc')->get();
    }

    public function galllery()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
}
