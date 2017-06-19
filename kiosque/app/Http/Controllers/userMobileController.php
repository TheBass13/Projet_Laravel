<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userMobileController extends Controller
{
    public function loginForm()
    {
        return view('/mobile/login');
    }

    public function login(Request $request)
    {
        if($request->only('email'))
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
                return redirect('/mobile/home');
            }else{
                session()->flash('alert-danger', 'Utilisateur ou mot de passe incorrect');
                session()->put('login', false);
                return redirect('/mobile/login');
            }
        }else
        {
            return redirect('/mobile/home');
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

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        // exécution de la session
        $content = json_decode(curl_exec($ch), true);
        // fermeture de la session
        curl_close($ch);
        if($content['email'] == $data['user']['email'])
        {
            session()->put('user_name',$content['name']);
            session()->put('user_id',$content['id']);
            session()->put('login', true);
            return redirect('/mobile/home');
        }else
        {
            session()->flash('alert-danger', 'Email déjà utilisé');
            return redirect('/mobile/register');
        }
    }

    public function home()
    {
        return view('/mobile/home');
    }
}
