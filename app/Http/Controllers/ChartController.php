<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function Index()
    {
        return view('CharSet.WebIndex');
    }

    public function mb_Index()
    {
        return view('CharSet.MobileIndex');
    }
}
