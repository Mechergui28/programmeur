<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Validator;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use App\Models\Formation;
use App\Models\FormationInscription;





class StripeController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient('sk_test_51M7F6UEozlZ1GsTG4DCTPQzQ0wl8leZFW85eqhCroe1ELmmhassGdAb0DEwwAWqUSW5whsQ8H8Gv1wgLtOgiqJlW00DImbTdMp');
    }
    public function stripePaymentForm(Request $request ){
        return view('payment-form');
    }
//    public function makeStripePayment(Request $request)
//     {
//         \Stripe\Stripe::setApiKey('sk_test_51M6ZLKB1Qs696VyeAIuamQlt0toRMzt6CyaX6SnkwtclO151L0d7vGSJHqCtduTcYIwtkT0GvfKGv1D6S4xrFFix00peNM3DPS');

//         \Stripe\Charge::create ([
//                 "amount" => 100 * 100,
//                 "currency" => "usd",
//                 "source" => $request->stripeToken,
//                 "description" => "Test payment from LaravelTus.com."
//         ]);

//         Session::flash('success', 'Payment successful!');

//         return back();
//     }
public function makeStripePayment(Request $request)
    {
        $inscription = new FormationInscription();

        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return response()->back();
        }

        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return response()->back();
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return response()->back();
        }
        $amount = $request->input('amount');

        $charge = $this->createCharge($token['id'], $amount *100);
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $request->session()->flash('success', 'Payment completed.');
        } else {
            $request->session()->flash('danger', 'Payment failed.');
        }
        $request->validate([
            'user_id' => 'required'
        ]);

        $inscription->etat = $request->input('etat', 'payé');
        $inscription->user_id = $request->user_id;
        $inscription->formation_id = $request->formation_id;
        $inscription->save();
        return redirect()->back();
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {

        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
