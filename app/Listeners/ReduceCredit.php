<?php

namespace App\Listeners;

use App\Events\OfferWasGiven;
use App\Models\User;

class ReduceCredit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OfferWasGiven  $event
     * @return void
     */
    public function handle(OfferWasGiven $event)
    {
        $user = User::find($event->offer->user_id);

        $user->reduceCredit($event->offer->price);
    }
}
