<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'photo',
        'address',
        'button_link',
        'other_photo',
        'url',
        'more_image_1',
        'more_image_2',
        'more_image_3',
        'user_id',
        'visible',
        'price',


    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }

}
