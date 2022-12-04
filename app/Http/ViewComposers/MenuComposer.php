<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use NguyenHuy\Menu\Models\Menus;

class MenuComposer
{

    private $headerMenu;
    private $footerMenu;

    public function __construct()
    {


        $this->headerMenu = Menus::where('name', 'Main Menu')->with(['items' => function ($q) {
            $q->orderBy('sort');
        }])->first();

        $this->footerMenu = Menus::where('name', 'Footer Menu')->with(['items' => function ($q) {
            $q->orderBy('sort');
        }])->first();
    }

    public function compose(View $view)
    {
        $view->with(['headerMenu' => $this->headerMenu, 'footerMenu' => $this->footerMenu]);
    }
}
