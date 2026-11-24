<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table  = "categories";
    protected $guarded = [];

    public $timestamps = false;

    public static function Data()
    {
        return self::where([
            ['type', '=', 'product'],
            ['visible', '=', 'yes'],
        ])->orderBy('order', 'desc')->get();
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
