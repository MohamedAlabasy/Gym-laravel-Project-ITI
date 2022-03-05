<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
class SessionsController extends Controller
{
    public function index(){
        $sessions=TrainingSession::all();
        return $sessions;
    }
    public function showSession($sessionId){
        $sessions=TrainingSession::find($sessionId);
        return $sessions;
    }
}
