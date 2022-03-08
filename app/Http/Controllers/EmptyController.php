<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmptyController extends Controller
{
    //empty statement
    public function empty()
    {
        return view('empty');
    }

    public function unAuth()
    {
        return view('500');
    }
}
