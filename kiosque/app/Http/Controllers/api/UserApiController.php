<?php

namespace App\Http\Controllers\api;

use App\Fiche;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserApiController extends Controller
{
    public function __construct()
    {
        $this->content = array();
    }

    public function login()
    {
        if (Auth::attempt(['email' => request('user')['email'], 'password' => request('user')['password']])) {
            $user = Auth::user();
            $this->content['user'] = $user;
            $this->content['login'] = true;
            $status = 200;
        } else {
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
        if ($user) {
            return response()->json(false, 401);
        } else {
            $user = User::create([
                'name' => $jsonUser['name'],
                'email' => $jsonUser['email'],
                'password' => bcrypt($jsonUser['password']),
            ])['id'];

            $user = User::whereEmail($email)->first();

            Fiche::create([
                'firstname' => $jsonUser['firstname'],
                'lastname' => $jsonUser['lastname'],
                'adress' => $jsonUser['adress'],
                'country' => $jsonUser['country'],
                'city' => $jsonUser['city'],
                'zipcode' => $jsonUser['zipcode'],
                'phone' => $jsonUser['phone'],
                'birthdate' => $jsonUser['birthdate'],
                'birthplace' => $jsonUser['birthplace'],
                'user_id' => $user['id'],
            ]);

            return response()->json($user, 200);
        }
    }

    public function editProfil()
    {
        $jsonUser = request('user');
        $id = $jsonUser['id'];
        if (User::find($id)) {
            $user = User::find($id);
            $fiche = Fiche::whereUserId($id)->first();
            if ($user->email == $jsonUser['email']) {
                $user->name = $jsonUser['name'];
               // $user->password = bcrypt($jsonUser['password']);
                $fiche->firstname = $jsonUser['firstname'];
                $fiche->lastname = $jsonUser['lastname'];
                $fiche->adress = $jsonUser['adress'];
                $fiche->country = $jsonUser['country'];
                $fiche->city = $jsonUser['city'];
                $fiche->zipcode = $jsonUser['zipcode'];
                $fiche->phone = $jsonUser['phone'];
                $fiche->birthplace = $jsonUser['birthplace'];
                $fiche->birthdate = $jsonUser['birthdate'];
                $user->save();
                $fiche->save();
            } else {
                if (User::whereEmail($jsonUser['email'])->first()) {
                    return response()->json(false, 401);
                } else {
                    $user->name = $jsonUser['name'];
                    //$user->password = bcrypt($jsonUser['password']);
                    $user->email = $jsonUser['email'];
                    $fiche->firstname = $jsonUser['firstname'];
                    $fiche->lastname = $jsonUser['lastname'];
                    $fiche->adress = $jsonUser['adress'];
                    $fiche->country = $jsonUser['country'];
                    $fiche->city = $jsonUser['city'];
                    $fiche->zipcode = $jsonUser['zipcode'];
                    $fiche->phone = $jsonUser['phone'];
                    $fiche->birthplace = $jsonUser['birthplace'];
                    $fiche->birthdate = $jsonUser['birthdate'];
                    $user->save();
                    $fiche->save();
                }
            }
            return response()->json($user, 200);
        } else {
            return response()->json('KO', 401);
        }
    }

    public function detailProfil($id)
    {
        $user = User::find($id);
        $fiche = Fiche::whereUserId($id)->first();

        $profil['user']['id'] = $user->id;
        $profil['user']['name'] = $user->name;
        $profil['user']['email'] = $user->email;
        $profil['user']['firstname'] = $fiche->firstname;
        $profil['user']['lastname'] = $fiche->lastname;
        $profil['user']['adress'] = $fiche->adress;
        $profil['user']['country'] = $fiche->country;
        $profil['user']['city'] = $fiche->city;
        $profil['user']['zipcode'] = $fiche->zipcode;
        $profil['user']['phone'] = $fiche->phone;
        $profil['user']['birthplace'] = $fiche->birthplace;
        $profil['user']['birthdate'] = $fiche->birthdate;

        return response()->json($profil, 200, [], JSON_NUMERIC_CHECK);

    }
}