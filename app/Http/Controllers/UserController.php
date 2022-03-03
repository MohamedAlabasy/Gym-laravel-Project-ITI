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
    public function show_profile()
    {

        return view('user.admin_profile');
    }
    public function edit_profile()
    {
        return view('user.edit_admin_profile');
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