<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    
    public function index()
    {

        return view();
    }
    public function create()
    {

        return view('gym.training_session');
    }
    public function store()
    {


        return redirect()->route('');
    }
    public function show()
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
