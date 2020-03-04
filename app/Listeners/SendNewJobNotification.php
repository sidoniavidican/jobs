<?php

namespace App\Listeners;

use App\Events\JobCreated;
use App\Mail\JobCreated as JobCreatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Notification;

class SendNewJobNotification
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
     * @param  JobCreated  $event
     * @return void
     */
    public function handle(JobCreated $event)
    {
        $notifications = Notification::where('category_id', $event->job->category_id)
            ->where('city_id', $event->job->city_id)
            ->get();
        foreach($notifications as $notification)  {
            Mail::to($notification->user->email)->send(
                new JobCreatedMail($event->job)
            );
        }
    }
}
