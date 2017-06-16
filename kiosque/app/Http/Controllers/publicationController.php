<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class publicationController extends Controller
{
    public function showForm()
    {
        return view('publish');

    }

    public function sendForm(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "titre" => "required|max:50|min:2",
            "nbnum" => "required",
            "photo" => "required",
            "details" => "required|max:150|min:10",
            "prix" => "required"
        ]);
        if ($validator->fails()) {
            return redirect("publish")
                ->withInput()
                ->withErrors($validator);
        } else {
            $publication = Publication::create($request->all());
            $publication->save();
            return redirect('home');
        }
    }

    public function listPubs()
    {
        $publication = Publication::all();
        return view('listPublish',['publication' => $publication] );
    }
}
