<?php

namespace App\Listeners;

use App\Jobs\IssueGenerator;

class IssueGenerateEventListener
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
    public function handle($event)
    {

        dispatch(new IssueGenerator($event->inputs))->onQueue('issues');
    }
}
