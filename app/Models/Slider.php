<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'photo',
        'title',
        'subtitle',
        'description',
        'button_link_1',
        'button_text_1',
        'button_link_2',
        'button_text_2',
        'visible',
        'order'
    ];
}
