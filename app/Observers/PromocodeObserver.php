<?php

namespace App\Observers;

use App\Models\Promocode;

class PromocodeObserver
{
    /**
     * Handle the Promocode "created" event.
     */
    public function created(Promocode $promocode): void
    {
        //
    }

    /**
     * Handle the Promocode "updated" event.
     */
    public function updated(Promocode $promocode): void
    {
    }

    public function updating(Promocode $promocode)
    {
        if (isset($promocode->getDirty()['user_id'])) {
            Promocode::where('user_id', auth()->id())->update([
                'user_id' => null
            ]);
        }
    }


    public function deleted(Promocode $promocode): void
    {
        //
    }

    /**
     * Handle the Promocode "restored" event.
     */
    public function restored(Promocode $promocode): void
    {
        //
    }

    /**
     * Handle the Promocode "force deleted" event.
     */
    public function forceDeleted(Promocode $promocode): void
    {
        //
    }
}
