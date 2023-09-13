<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetPageController extends Controller
{
    public function Index()
    {
        return view('SetPage.WebIndex');
    }

    public function mb_Index()
    {
        return view('SetPage.MobileIndex');
    }
}
