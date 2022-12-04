<?php

namespace App\Http\ViewComposers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;

class SettingsComposer
{

    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function compose(View $view)
    {
        $view->with('settings', $this->setting->all());
    }
}
