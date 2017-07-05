<?php

namespace App\Http\Controllers\api;

use App\Publication;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SubscriptionApiController extends Controller
{
    //récupère tout les abonnements selon son ID
    public function getSubscriptionWithId($id)
    {
        $subscriptions = Subscription::where('user_id',$id)->get()->sortBy('expiry_date');
        $publications= [];
        foreach ($subscriptions as $subscription){
            if($subscription->actif != false){
                $publications[$subscription->id] = Publication::find($subscription->publication_id);
                $publications[$subscription->id]['expiry_date'] = $subscription->expiry_date;
                $publications[$subscription->id]['payed'] = $subscription->payed;
            }
        }
        //JSON_NUMERIC_CHECK permet d'avoir nos integer au lieu de chaine de caractère
        return response()->json($publications,200,[],JSON_NUMERIC_CHECK);

    }

    public function subscriptiontest(){

        $jsonUser = request('subscription');
        $sub = Subscription::create([
            'user_id' => $jsonUser['user_id'],
            'publication_id' => $jsonUser['publication_id'],
            'payed' => $jsonUser['payed'],
            'expiry_date' => $date = Carbon::now()->addYear(1)->format('d/m/Y'),
        ]);

        return response()->json($sub->id, 200,[],JSON_NUMERIC_CHECK);
    }

    public function subscription(){

        $jsonSub = request('subscription');
        $subscription = Subscription::whereUserId($jsonSub['user_id'])->wherePublicationId($jsonSub['publication_id'])->first();

        //Test si la personne est déja abonné
        if(Subscription::whereUserId($jsonSub['user_id'])->wherePublicationId($jsonSub['publication_id'])->count() > 0)
        {
            //Reactive l'abonnement
            if($subscription['actif'] == false){
                $subscription->actif = true;
                $subscription->expiry_date =  Carbon::now()->addYear(1)->format('d/m/Y');
                $subscription_id = $subscription->id;
                $subscription->save();
                return response()->json($subscription_id, 200,[],JSON_NUMERIC_CHECK);
            }
            else{
                return response()->json('Personne déja abonné', 401,[],JSON_NUMERIC_CHECK);
            }
        }else{
            $sub = Subscription::create([
                'user_id' => $jsonSub['user_id'],
                'publication_id' => $jsonSub['publication_id'],
                'payed' => $jsonSub['payed'],
                'expiry_date' => $date = Carbon::now()->addYear(1)->format('d/m/Y'),
            ]);

            return response()->json($sub->id, 200,[],JSON_NUMERIC_CHECK);
        }
    }

    //Désabonnement
    public function unSubscription(){
        $jsonSub = request('subscription');
        $sub = Subscription::whereUserId($jsonSub['user_id'])->wherePublicationId($jsonSub['publication_id'])->first();
        $sub->actif = false;
        $sub->save();
        return response()->json($sub,200,[],JSON_NUMERIC_CHECK);
    }

    //Relancer un abonnement
    public function reviveSubscription(){
        //dd(request()->all());
        $jsonSub = request('subscription');
        $sub = Subscription::whereUserId($jsonSub['user_id'])->wherePublicationId($jsonSub['publication_id'])->first();
        $subStrDate = $sub->expiry_date ;
        $subTimeStamp = strtotime($subStrDate);
        $sub->expiry_date = Carbon::createFromTimestamp($subTimeStamp)->addYear(1)->format('d/m/Y');
        $sub->save();
        return response()->json($sub,200,[],JSON_NUMERIC_CHECK);
    }
}