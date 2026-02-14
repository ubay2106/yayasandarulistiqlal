<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function ra()
    {
        return view('page.radarussalam');
    }
    public function mi()
    {
        return view('page.midarussalam');
    }
    public function mts()
    {
        return view('page.mtsdarussalam');
    }
}
