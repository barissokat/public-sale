<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

     /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
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

    /**
     * A product can have many offers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }


    /**
     * Give offer a user to the current product.
     *
     * @param  int|null $price
     * @return $this
     */
    public function giveOffer($price)
    {
        $offer = Offer::where([['user_id', auth()->id()], ['product_id', $this->id]])->first();

        if ($offer) {
            $offer->update(['price' => $price]);
        } else {
            $this->offers()->create([
                'user_id' => auth()->user()->id,
                'price' => $price,
            ]);
        }

        return $this;
    }
}
