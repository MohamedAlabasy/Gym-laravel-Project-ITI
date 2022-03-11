<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
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
        $packageInfo = explode('|',$request->package_id);
        $price = $packageInfo[1];
        $training_package_id = $packageInfo[0];
        $city = explode('|', $request->gym_id);
        // $gym_id = $city[0];
        // $cityname = $city[1];
        $user = User::find($request->user_id);
        $user_id = $request->user_id;
        // dd($price[1], $gym_id, $cityname);
        // dd($gym_id, $cityname, $price[0], $price[1]);
        // dd($user, $user->gym->name, $user->city->name , $cityname);
        // dd($price,$user_id,$training_package_id);
        

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $price[1] * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Successfully Bought"
        ]);
     $this->mahmoud = $user;
        Session::flash('success', 'Payment successful!');
        Revenue::create([
            'price' => $price,
            'payment_id' => $training_package_id +1,
            // 'statuses' => 'paid',
            'visa_number' => '4242 4242 4242 4242',
            'payment_method' => 'stripe',
            'user_id' => $user_id,
            'training_package_id' => $training_package_id,
            
        ]);
        // return view('TrainingSessions.listSessions', [
        //     'price' =>$price,
        // ]);
        //store data in database
        // return $this->test($user);
    }

    // private function test($data)
    // {
        // dd($data, $this->mahmoud);
        //return to the view
    // }
    
}
