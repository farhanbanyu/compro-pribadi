<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryAddOn extends Model
{
    protected $table = 'category_add_on';

    protected $fillable = [
        'title',
    ];

    public function addOns(): HasMany
    {
        return $this->hasMany(AddOn::class, 'category_id');
    }
}
