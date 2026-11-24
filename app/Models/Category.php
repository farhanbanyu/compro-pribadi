<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
   
    public function getBrandsAttribute()
    {
        // ambil id brand dari kolom "brand" (json array of IDs)
        $brandIds = json_decode($this->brand, true);
        if (!$brandIds || !is_array($brandIds)) {
            return collect();
        }
        return Partner::whereIn('id', $brandIds)->get();
    }
}
