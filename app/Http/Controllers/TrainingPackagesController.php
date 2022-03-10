<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingPackage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TrainingPackagesController extends Controller
{
    //
      #=======================================================================================#
    #			                             index                                         	#
    #=======================================================================================#
    public function index()
    {
        $packages = TrainingPackage::all();
        if (count($packages) <= 0) { //for empty statement
            return view('empty');
        }
        return view('trainingPackeges.listPackeges', ['packages' => $packages]);
    }

    // public function getSession(Request $request) {
    //     if($request->ajax()) {
    //         $data = TrainingSession::latest()->get();
    //         return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('action', function() {
    //             $actionBtn = '<div class = "text-center">
    //             <a href="#" class = "btn btn-danger">Delete</a>
    //             <a href="#" class = "btn btn-info">View</a>
    //             <a href="#" class = "btn btn-success">Update</a>
    //             </div>'
    //            ;
    //             return $actionBtn;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    //     }
    // }
    #=======================================================================================#
    #			                             create                                        	#
    #=======================================================================================#
    public function create()
    {
        $packages = TrainingPackage::all();

        // $users = User::all();
        // $post->user? $post->user->name
        // foreach ($users as $user) {
        //     if ($user->hasRole('coach')) {
        //         $coaches[] = $user;
        //     }
        // }
        return view('trainingPackeges.creatPackege', [
            'packages' => $packages,
            
        ]);
    }
    #=======================================================================================#
    #			                             store                                         	#
    #=======================================================================================#
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'price' => ['required'],
            'sessions_number' => ['required'],
            

        ]);
        // $requestData = request()->all();
        // TrainingPackage::create($requestData);
        $package = new TrainingPackage();
    	$package->name = $request->get('name');
    	$package->price = $request->get('price') * 100;
    	$package->sessions_number = $request->get('sessions_number');
        $package->user_id = auth()->user()->id;
         $package->save();
        //  dd($package);
        // $package->user()->attach($package);


        return redirect()->route('trainingPackeges.listPackeges');
    }
    #=======================================================================================#
    #			                             show                                         	#
    #=======================================================================================#
    public function show($id)
    {
        $package = TrainingPackage::findorfail($id);
        return view('trainingPackeges.show_training_package', ['package' => $package]);
    }
    #=======================================================================================#
    #			                             edit                                         	#
    #=======================================================================================#
    public function edit($id)
    {
        $packages = TrainingPackage::all();

        $package = TrainingPackage::find($id);

        return view('trainingPackeges.editPackege', ['package' => $package, 'packages' => $packages]);
    }
    #=======================================================================================#
    #			                             update                                         #
    #=======================================================================================#
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'price' => ['required'],
            'session_number' => ['required'],
            

        ]);


        TrainingPackage::where('id', $id)->update([

            'name' => $request->all()['name'],
            'price' => $request->price,
            'sessions_number' => $request->sessions_number,
           



        ]);
        return redirect()->route('trainingPackeges.listPackeges');
    }
    #=======================================================================================#
    #			                             destroy                                       	#
    #=======================================================================================#
    public function deletePackage($id)
    {
        $package = TrainingPackage::findorfail($id);
        $package->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
