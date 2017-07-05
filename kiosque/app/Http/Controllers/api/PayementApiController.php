<?php

namespace App\Http\Controllers\api;

use App\Payment;
use App\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayementApiController extends Controller
{

    public function getPaymentWithId($id)
    {
        $payments = Payment::whereSubscriptionId($id)->get();
        return response()->json($payments,200,[],JSON_NUMERIC_CHECK);

    }


    public function transactionCallBack()
    {
        if (request()->has('cid') && request()->has('transaction') && request()->has('amount')) {
            $payment = Payment::find((int)request('cid'));
            if ($payment) {
                $payment->transaction = request('transaction');
                $payment->type = request('type');
                $payment->amount = request('amount');
                $payment->realAmount = request('amount');
                $payment->status = true;
                $payment->save();
                return response()->json('OK', 200);
            } else {
                return response()->json('KO', 405);
            }
        } else {
            return response()->json('KO', 401);
        }
    }

    public function createPayment()
    {
        $paymentJson = request()->all();
        if ($paymentJson['payment'] != null) {
            $payment = $paymentJson['payment'];
            $id = Payment::create([
                'subscription_id' => $payment['subscription_id'],
                'user_id' => $payment['user_id'],
            ])->id;
            return response()->json($id, 200);
        } else {
            return response()->json(401);
        }
    }

    public function validatePayment()
    {
        if(request('payment'))
        {
            $payment = request('payment');

            $payment_id = $payment['payment_id'];
            $expiry = $payment['expiry'];
            $number = $payment['number'];
            $amount = Payment::find($payment_id)->subscription->publication->prix;

            if($amount)
            {
                $url = "http://10.0.0.6:6543/cardpay/4a20c294-0a6c-21d7-07d0-6589727b000d/" . $payment_id . "/" . $number . "/" . $expiry . "/" . $amount;
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                $content_statut = curl_getinfo($ch,CURLINFO_HTTP_CODE);
                curl_close($ch);
                return response()->json($content_statut);
            }else{
                return response('ko', 404);
            }
        }else
        {
            return response('ko', 504);
        }

    }

    public function refund($id)
    {
        if (request()->has('payment_id')) {
            $refund = request('refund');
            $amount = request('amount');

            return response()->json('OK', 200);
        } else {
            return response()->json('KO', 401);
        }

    }
}