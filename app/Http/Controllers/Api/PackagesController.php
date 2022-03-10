<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $sessions = TrainingPackage::all();
        return $sessions;
    }
    public function showPackage($packageId)
    {
        $package = TrainingPackage::find($packageId);
        return [
            'name' => $package->name,
            'price' > $package->price
        ];
    }
}
