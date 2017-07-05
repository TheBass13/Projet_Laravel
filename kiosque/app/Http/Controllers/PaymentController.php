<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function getPaymentLate()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $payments = Payment::whereUserId(Auth::user()->id)->whereStatus(false)->orderBy('created_at')->paginate(12);
            return view('latePaymentList', ['payments' => $payments]);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function getPaymentToRefund()
    {
        if (auth()->user()['original']['isemploye'] == true) {

            $payments = Payment::whereUserId(Auth::user()->id)->whereStatus(true)->orderBy('created_at')->paginate(12);

            return view('latePaymentList', ['payments' => $payments]);
        } else {
            return redirect('/mobile/home');
        }
    }


}
