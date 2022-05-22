<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use App\Models\TrainingPackage;
use App\Models\User;
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
        $packageInfo = explode('|', $request->package_id);
        $price = $packageInfo[1];
        $training_package_id = $packageInfo[0];
        $city = explode('|', $request->gym_id);
        $gym_id = $city[0];
        $cityname = $city[1];
        $user = User::find($request->user_id);
        $package = TrainingPackage::find($training_package_id);
        $user->total_sessions += $package->sessions_number;
        $user_id = $request->user_id;
        $userEmail = $user->email;
        $userName = $user->name;
        $packageName = $package->name;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $price[1] * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Successfully Bought",
        ]);

        Session::flash('success', 'Payment successful!');
        Revenue::create([
            'price' => $price,
            'payment_id' => $training_package_id + $user_id,
            'visa_number' => '4242 4242 4242 4242',
            'payment_method' => 'stripe',
            'user_id' => $user_id,
            'training_package_id' => $training_package_id,

        ]);

        $user->update(['total_sessions' => $user->total_sessions]);

        return redirect()->route('PaymentPackage.purchase_history');
    }

    public function index()
    {
        $revenues = Revenue::all();
        return view('PaymentPackage.purchase_history', [
            'revenues' => $revenues,
        ]);
    }
}
