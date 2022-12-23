<?php

namespace App\Listeners;

use App\Events\UserJoinedRoom;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendJoinedRoomNotification
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
     * @param  \App\Events\UserJoinedRoom  $event
     * @return void
     */
    public function handle(UserJoinedRoom $event)
    {
        //
    }
}
