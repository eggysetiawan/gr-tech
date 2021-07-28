<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Jobs\SendEmployeeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessEmployeeCreated
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
     * @param  object  $event
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
        SendEmployeeNotification::dispatch($event->employee);
    }
}
