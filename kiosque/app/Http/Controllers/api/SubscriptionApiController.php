<?php

namespace App\Http\Controllers\api;

use App\Publication;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionApiController extends Controller
{
    //récupère une publication selon son ID
    public function getSubscriptionWithId($id)
    {
        $subscriptions = Subscription::where('user_id',$id)->get();
        $publications= [];
        foreach ($subscriptions as $subscription){
           $publications[$subscription->publication_id] = Publication::find($subscription->publication_id);
        }
        //JSON_NUMERIC_CHECK permet d'avoir nos integer au lieu de chaine de caractère
        return response()->json($publications,200,[],JSON_NUMERIC_CHECK);

    }

    public function subscription(){

        $jsonUser = request('subscription');
            Subscription::create([
                'user_id' => $jsonUser['user_id'],
                'publication_id' => $jsonUser['publication_id'],
                'payed' => $jsonUser['payed'],
            ]);

            return response()->json("OK", 200,[],JSON_NUMERIC_CHECK);
        }

    public function removeSubscription($id){

    }
}
