<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->content = array();
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('user')['email'], 'password' => request('user')['password']])){
            $user = Auth::user();
            $this->content['user'] = $user;
            $status = 200;
        }
        else{
            $this->content['error'] = "Unauthorised";
            $status = 401;
        }
        return response()->json($this->content, $status);
    }

    public function register()
    {
        $data = request('user');
        $email = $data['email'];
        $user = User::whereEmail($email)->first();
        if($user)
        {
            return response()->json($user,401);
        }else
        {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            return response()->json('ok',200);
        }
    }
}