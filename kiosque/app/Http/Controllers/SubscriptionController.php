<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function listSub()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $subscriptions = Subscription::orderBy('payed')->paginate(12);
            return view('subscriptionList', ['subscriptions' => $subscriptions]);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function detailSub($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $subscription = Subscription::find($id);
            return view('subscription', ['subscription' => $subscription]);
        } else {
            return redirect('/mobile/home');
        }
    }
}
