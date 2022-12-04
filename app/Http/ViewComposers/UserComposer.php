<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class UserComposer
{

    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function compose(View $view)
    {

        if (\auth()->check()) {
            $lastLogin = Activity::where(function ($query) {
                $query->where('causer_id', $this->user->id);
                $query->where('log_name', 'login');

            })->latest()->first()->created_at;
        } else {
            $lastLogin = now();
        }


        $view->with(['user' => $this->user, 'lastLogin' => $lastLogin]);
    }
}
