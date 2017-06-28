<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionMobileController extends Controller
{
    public function subscription($idPublication)
    {
        // initialisation de la session
        $ch = curl_init();
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, "http://kiosque.dev/api/subscription");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $data = [];
        $data['subscription']['user_id'] = session()->get('user_id');
        $data['subscription']['publication_id'] = $idPublication;
        $data['subscription']['payed'] = false;

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        // exécution de la session
        $content = json_decode(curl_exec($ch), true);

        // fermeture de la session
        curl_close($ch);

        return view('mobile/home');
    }

    public function getSubscriptionWithId($id)
    {
        $url = "http://kiosque.dev/api/getSubscriptionWithId/$id";

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_USERAGENT      => "test", // name of client
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
            CURLOPT_TIMEOUT        => 120,    // time-out on response
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

       $subscriptions = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return view('mobile/listAbonnement')->with('subscriptions',$subscriptions);
    }
}
