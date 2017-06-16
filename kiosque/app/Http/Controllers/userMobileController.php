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
                $request->session()->put('user_id',$content['user']['id']);
                $request->session()->put('login', true);
                return redirect('/');
            }else{
                $request->session()->flash('alert-danger', 'Utilisateur ou mot de passe incorrect');
                $request->session()->put('login', false);
                return redirect('/login',$request);
            }
        }else
        {
            return redirect('/home');
        }
    }

    public function logout()
    {
        session::flush();
        return view('login');
    }
}
