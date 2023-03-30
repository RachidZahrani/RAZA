<?php

namespace App\Listeners;

use App\Events\modifyTach;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class infoTach
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
     * @param  \App\Events\modifyTach  $event
     * @return void
     */
    public function handle(modifyTach $event)
    {
        \Log::info("la tache ".$event->tache->id . "a ete modifie : " .$event->tache->statut );
    }
}
