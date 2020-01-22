<?php

namespace App\Listeners;

use App\Events\ComplaintNotif;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendComplaintNotif
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
     * @param  ComplaintNotif  $event
     * @return void
     */
    public function handle(ComplaintNotif $event)
    {
        //
    }
}
