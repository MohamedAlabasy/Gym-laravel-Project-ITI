<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        return view();
    }
    public function create()
    {

        return view();
    }
    public function store()
    {


        return redirect()->route('');
    }
    public function show($postId)
    {

        return view('');
    }
    public function edit()
    {
        return view('');
    }
    public function update()
    {

        return redirect()->route('');
    }

    public function destroy()
    {


        return redirect()->route('');
    }
}