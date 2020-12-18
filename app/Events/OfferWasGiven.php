<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class OfferWasGiven
{
    use SerializesModels;

    /**
     * The offer that was given.
     *
     * @param \App\Offer $offer
     */
    public $offer;

    /**
     * Create a new event instance.
     *
     * @param \App\Offer $offer
     * @return void
     */
    public function __construct($offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get the subject of the event.
     */
    public function subject()
    {
        return $this->offer;
    }
}
