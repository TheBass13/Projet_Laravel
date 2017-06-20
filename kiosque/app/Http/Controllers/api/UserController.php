<?php
namespace App\Http\Controllers\api;

use App\Fiche;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->content = array();
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('user')['email'], 'password' => request('user')['password']]))
        {
            $user = Auth::user();
            $this->content['user'] = $user;
            $this->content['login'] = true;
            $status = 200;
        }
        else{
            $this->content['login'] = false;
            $status = 401;
        }
        return response()->json($this->content, $status);
    }

    public function register()
    {
        $jsonUser = request('user');
        $email = $jsonUser['email'];
        $user = User::whereEmail($email)->first();
        if($user)
        {
            return response()->json(false,401);
        }
        else
        {
            $user = User::create([
                'name' => $jsonUser['name'],
                'email' => $jsonUser['email'],
                'password' => bcrypt($jsonUser['password']),
            ])['id'];

            $user = User::whereEmail($email)->first();

            Fiche::create([
                'firstname' => $jsonUser['firstname'],
                'lastname'=> $jsonUser['lastname'],
                'adress'=> $jsonUser['adress'],
                'country'=> $jsonUser['country'],
                'city'=> $jsonUser['city'],
                'zipcode'=> $jsonUser['zipcode'],
                'phone'=> $jsonUser['phone'],
                'birthdate'=> $jsonUser['birthdate'],
                'birthplace'=> $jsonUser['birthplace'],
                'user_id' => $user['id'],
            ]);
            return response()->json($user,200);
        }
    }
}