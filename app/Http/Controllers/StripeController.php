<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\User;

class StripeController extends Controller
{

    //
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        
        return view('PaymentPackage.stripe');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // dd("ok");
        // dd($request);
        $packageInfo = explode('|',$request->package_id);
        $price = $packageInfo[1];
        $training_package_id = $packageInfo[0];
        $city = explode('|', $request->gym_id);
        $gym_id = $city[0];
        $cityname = $city[1];
        // dd($cityname,$gym_id);
        $user = User::find($request->user_id);
        $package = TrainingPackage::find($training_package_id);
        $user_id = $request->user_id;
        $userEmail = $user->email;
        $userName = $user->name;
        $packageName = $package->name;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $price[1] * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Successfully Bought"
        ]);
       
        Session::flash('success', 'Payment successful!');
        Revenue::create([
            'price' => $price,
            'payment_id' => $training_package_id +$user_id,
            'visa_number' => '4242 4242 4242 4242',
            'payment_method' => 'stripe',
            'user_id' => $user_id,
            'training_package_id' => $training_package_id,
            
        ]);
        

        return redirect()->route('PaymentPackage.purchase_history');
    }

    public function index()
    {
        $revenues = Revenue::all();
        // $userData = $revenue->user;
        // $userGym = $userData->gym->name;
        // $userCity = $userData->city->name;
        // foreach ($revenues as $key => $value) {
        //     # code...
        
        // }
        // dd($userData, $revenue, $userGym,$userCity);
      return view('PaymentPackage.purchase_history', [
        //   'userName' => $userName,
        //   'userEmail' => $userEmail,
        //   'packageName' => $packageName,
        //   'price' => $price,
       'revenues' => $revenues,
      ]);

    
    }
    
}
