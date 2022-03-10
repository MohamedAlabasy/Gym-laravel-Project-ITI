<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

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
        dd($request);
        $price = explode('|',$request->package_id);
        $city = explode('|', $request->gym_id);
        $gym_id = $city[0];
        $cityname = $city[1];
        // dd($price[1]);
        dd($gym_id, $cityname, $price[0], $price[1]);


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $price[1] * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Successfully Bought"
        ]);
        
        Session::flash('success', 'Payment successful!');
           
        return redirect()->route('SessionController.stripe');
    }
    
}
