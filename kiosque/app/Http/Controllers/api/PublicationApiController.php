<?php

namespace App\Http\Controllers\api;

use App\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicationApiController extends Controller
{
    public function getPublications()
    {
        $publication = Publication::all();
        //JSON_NUMERIC_CHECK permet d'avoir nos integer au lieu de chaine de caractère
        return response()->json($publication,200,[],JSON_NUMERIC_CHECK);

    }

//récupère une publication selon son ID
    public function getPublicationWithId($id)
    {
        $publication = Publication::whereId($id)->get();
        //JSON_NUMERIC_CHECK permet d'avoir nos integer au lieu de chaine de caractère
        return response()->json($publication,200,[],JSON_NUMERIC_CHECK);

    }

}