<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LoginSuccessful
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
     * @param \Illuminate\Auth\Events\Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->subject = 'login';
        $event->description = $event->user->email;
        //\Session::flash('login-success','Hello'.$event->user->first_name. ', welcome back');
        activity($event->subject)
            ->by($event->user)
            ->log($event->description);
    }
}
