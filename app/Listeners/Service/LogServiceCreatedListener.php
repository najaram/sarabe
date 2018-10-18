<?php

namespace App\Listeners\Service;

use App\Events\Service\ServiceCreated;

class LogServiceCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  ServiceCreated $event
     * @return void
     */
    public function handle(ServiceCreated $event)
    {
        $activity = activity('services')->on($event->service);
        $description = "Service created";

        if ($event->causer) {
            $activity = $activity->by($event->causer);
            $description .= " by {$event->causer->name}";
        }

        $activity->log($description);
    }
}
