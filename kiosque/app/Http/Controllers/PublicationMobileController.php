<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicationMobileController extends Controller
{
    //
    public function getPublication()
    {
        $url = "http://kiosque.dev/api/getPublication";

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

        $publications = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return view('mobile/listPublication')->with('publications',$publications);
    }

    public function getPublicationWithId($id)
    {
        $url = "http://kiosque.dev/api/getPublicationWithId/$id";

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

        $detailPublication = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return view('mobile/detailPublication')->with('detailPublication',$detailPublication);
    }
}



