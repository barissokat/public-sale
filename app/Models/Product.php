<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the path to the product's image.
     *
     * @param  string $avatar
     * @return string
     */
    public function getImagePathAttribute($image_path)
    {
        return asset(Storage::url($image_path));
    }
}
