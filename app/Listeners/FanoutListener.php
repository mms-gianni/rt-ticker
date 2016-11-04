<?php

namespace App\Listeners;

use App\Events\FanoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Fanout\Fanout;

class FanoutListener
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
     * @param  FanoutEvent  $event
     * @return void
     */
    public function handle(FanoutEvent $event)
    {
        $message = $event->message;
        $channel = $event->channel;
        $fanout = new Fanout('f4ba43e0', '49R+AYRkC4HbwiC1EL1LOA==');
        $fanout->publish($channel, $message );
    }
}
