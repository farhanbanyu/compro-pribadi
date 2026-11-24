<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPortfolio extends Model
{
    protected $table  = "categories";
    protected $guarded = [];

    public $timestamps = false;

    public static function Data()
    {
        return self::where([
            ['type', '=', 'portfolio'],
            ['visible', '=', 'yes'],
        ])->orderBy('order', 'desc')->get();
    }

    
}
