<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {

        return view('backend.menu');

    }


}
