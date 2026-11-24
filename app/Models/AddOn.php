<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddOn extends Model
{
    protected $table = 'add_on';

    protected $fillable = [
        'title',
        'description',
        'file',
        'category_id',
        'visible',
    ];

    public function categoryAddOn(): BelongsTo
    {
        return $this->belongsTo(CategoryAddOn::class, 'category_id');
    }
}
