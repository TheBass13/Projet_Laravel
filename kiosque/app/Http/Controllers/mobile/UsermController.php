<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsermController extends Controller
{
    public function login(Request $request)
    {
        if($request->only('email'))
        {
            $array['user']['email'] = $request->only('email');
            $array['user']['password'] = $request->only('password');

        }else
        {
            return redirect('/home');
        }
    }
}
