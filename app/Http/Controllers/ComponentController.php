<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function Index()
    {
        return view('Component.WebIndex');
    }

    public function mb_Index()
    {
        return view('Component.MobileIndex');
    }
}
