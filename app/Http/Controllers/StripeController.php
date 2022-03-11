<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\User;

class StripeController extends Controller
{
    private $mahmoud = 0;
    //price

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
        $price = explode('|',$request->package_id);
        $city = explode('|', $request->gym_id);
        $gym_id = $city[0];
        $cityname = $city[1];
        $user = User::find($request->user_id);
        // dd($price[1], $gym_id, $cityname);
        // dd($gym_id, $cityname, $price[0], $price[1]);
        // dd($user, $user->gym, $user->city);


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $price[1] * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Successfully Bought"
        ]);
     $this->mahmoud = $user;
        Session::flash('success', 'Payment successful!');
        //store data in database
        return $this->test($user);
    }
    private function test($data)
    {
        dd($data, $this->mahmoud);
        //return to the view
    }
    
}
