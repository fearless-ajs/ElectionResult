<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppPagesController extends Controller
{

    public function home()
    {
        return view('pages.index');
    }

    public function addResult()
    {
        return view('pages.new_result');
    }

    public function lgaResult()
    {
        return view('pages.lga_result');
    }
}
