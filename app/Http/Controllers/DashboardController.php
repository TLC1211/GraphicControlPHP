<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('DashBoard.WebIndex');
    }

    public function mb_Index()
    {
        return view('DashBoard.MobileIndex');
    }

}
