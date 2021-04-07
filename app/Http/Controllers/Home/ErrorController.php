<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function errorCode404()

    {
        return view('home.error.404');
    }


    public function errorCode405()

    {
        return view('home.error.405');
    }
}
