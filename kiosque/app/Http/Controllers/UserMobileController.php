<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\Notifications\RegisteredUser;
use App\User;
use Illuminate\Http\Request;

class userMobileController extends Controller
{
    public function loginForm()
    {
        return view('/mobile/login');
    }

    public function login(Request $request)
    {
        $confirmation_token = $request->only('confirmation_token')['confirmation_token'];

        if($confirmation_token != null){
            return redirect('mobile/login')->with('error','Vous n\'avez pas confirmé votre compte');
        }
        elseif($request->only('email'))
        {
            // initialisation de la session
            $ch = curl_init();
            // configuration des options
            curl_setopt($ch, CURLOPT_URL, "http://kiosque.dev/api/login");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = [];
            $data['user']['email'] = $request->only('email')['email'];
            $data['user']['password'] = $request->only('password')['password'];

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            // exécution de la session
            $content = json_decode(curl_exec($ch), true);
            // fermeture de la session
            curl_close($ch);

            if($content['login'])
            {
                session()->put('user_name',$content['user']['name']);
                session()->put('user_id',$content['user']['id']);
                session()->put('login', true);
                return redirect("/mobile/getSubscriptionWithId/".session()->get('user_id'));
            }else{
                session()->flash('error','Utilisateur ou mot de passe incorrect');
                session()->put('login', false);
                return redirect('/mobile/login');
            }
        }else
        {
            return redirect('mobile/login')->with('error','Utilisateur ou mot de passe incorrect');
        }
    }
    
    public function logout()
    {
        session()->flush();

        return redirect('/mobile/login');
    }

    public function registerForm()
    {
        return view('/mobile/register');
    }
    
    public function register(Request $request)
    {
        // initialisation de la session
        $ch = curl_init();
        // configuration des options
        curl_setopt($ch, CURLOPT_URL, "http://kiosque.dev/api/register");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        
        $data = [];
        $data['user']['name'] = $request->only('name')['name'];
        $data['user']['email'] = $request->only('email')['email'];
        $data['user']['password'] = $request->only('password')['password'];
        $data['user']['firstname'] = $request->only('firstname')['firstname'];
        $data['user']['lastname'] = $request->only('lastname')['lastname'];
        $data['user']['adress'] = $request->only('adress')['adress'];
        $data['user']['city'] = $request->only('city')['city'];
        $data['user']['zipcode'] = $request->only('zipcode')['zipcode'];
        $data['user']['country'] = $request->only('country')['country'];
        $data['user']['phone'] = $request->only('phone')['phone'];
        $data['user']['birthdate'] = $request->only('birthdate')['birthdate'];
        $data['user']['birthplace'] = $request->only('birthplace')['birthplace'];
       // $data['user']['confirmation_token'] = bcrypt(str_random(16));

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        // exécution de la session
        $content = json_decode(curl_exec($ch), true);

        // fermeture de la session
        curl_close($ch);

        if($content['email'] == $data['user']['email'])
        {
            return redirect("/mobile/home")->with('success','Inscription réussite ! Vous avez reçu un mail');
        }
        else
        {
            session()->flash('alert-danger', 'Email déjà utilisé');
            return redirect('/mobile/register');
        }
    }

    public function detailProfil($id,$operation)
    {
        $url = "http://kiosque.dev/api/detailProfil/$id";

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

        $profil = json_decode(curl_exec($ch), true);

        curl_close($ch);

        if($operation == "edit"){
            return view('mobile/editProfil')->with('detailProfil',$profil);
        }elseif ($operation =="detail"){
            return view('mobile/detailProfil')->with('detailProfil',$profil);
        }
    }

    public function editProfil(Request $request)
    {

        $id = session('user_id');
        // initialisation de la session
        $ch = curl_init();

        // configuration des options
        curl_setopt($ch, CURLOPT_URL, "http://kiosque.dev/api/editProfil");
        curl_setopt($ch, CURLOPT_POST, 1 );
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $data = [];
        $data['user']['name'] = $request->only('name')['name'];
        $data['user']['email'] = $request->only('email')['email'];
       // $data['user']['password'] = $request->only('password')['password'];
        $data['user']['firstname'] = $request->only('firstname')['firstname'];
        $data['user']['lastname'] = $request->only('lastname')['lastname'];
        $data['user']['adress'] = $request->only('adress')['adress'];
        $data['user']['city'] = $request->only('city')['city'];
        $data['user']['zipcode'] = $request->only('zipcode')['zipcode'];
        $data['user']['country'] = $request->only('country')['country'];
        $data['user']['phone'] = $request->only('phone')['phone'];
        $data['user']['birthdate'] = $request->only('birthdate')['birthdate'];
        $data['user']['birthplace'] = $request->only('birthplace')['birthplace'];
        $data['user']['id'] = $id;


        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $profil = json_decode(curl_exec($ch), true);

        if (curl_errno($ch)) {
            dd(curl_error($ch));
        }

        // fermeture de la session
        curl_close($ch);

       return redirect('/mobile/detailProfil/'.$id.'/detail');

    }

    public function getUserWithToken($id,$token){
        $url = "http://kiosque.dev/api/getUserWithToken/$id/$token";

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

        $user = json_decode(curl_exec($ch), true);

        curl_close($ch);

        return $user;
    }

    public function confirmUser(Request $request,$id, $token){

        $user = $this->getUserWithToken($id,$token);

        if($user){
            // initialisation de la session
            $ch = curl_init();

            // configuration des options
            curl_setopt($ch, CURLOPT_URL, "http://kiosque.dev/api/confirmUser");
            curl_setopt($ch, CURLOPT_POST, 1 );
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            $data = [];
            $data['user']['id'] = $id;

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

            $confirmation_token = json_decode(curl_exec($ch), true);

            // fermeture de la session
            curl_close($ch);

            session()->put('user_name',$user['user']['name']);
            session()->put('user_id',$confirmation_token['id']);
            session()->put('login', true);

            return redirect('/mobile/listPublication');
        }else {
            return redirect('mobile/login')->with('error','Ce lien ne semble plus valide');
        }
    }

    public function home()
    {
        return view('/mobile/home');
    }
}
