<?php

namespace App\Http\Controllers;

use App\Publication;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class publicationController extends Controller
{
    public function showForm()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            return view('publish');
        } else {
            return redirect('/mobile/home');
        }
    }

    public function sendForm()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $validator = \Validator::make(request()->all(), [
                "titre" => "required|max:50|min:2",
                "nbnum" => "required",
                "details" => "required|max:1000|min:10",
                "prix" => "required"
            ]);
            if ($validator->fails()) {
                return redirect("/publish")
                    ->withInput()
                    ->withErrors($validator);
            } else {
                if (request()->file("photo") != null) {
                    $pattern = '/image/';
                    $file = Input::file('photo');
                    if (!preg_match($pattern, $file->getMimeType())) {
                        session()->flash('alert-danger', "L'image n'est pas valide");
                        return redirect('/publish');
                    } else {
                        $path = 'images';
                        $ext = $file->getClientOriginalExtension();
                        $date = Carbon::now()->format('YmdHys');
                        $name = $date . "." . $ext;
                        $img = \Intervention\Image\Facades\Image::make($file->getRealpath());
                        $img->resize(420, 594)->save($path . "/" . $name);


                        Publication::create([
                            'titre' => request('titre'),
                            'nbnum' => request('nbnum'),
                            'photo' => $name,
                            'details' => request('details'),
                            'prix' => request('prix'),
                        ]);

                        return redirect('/publication/list');
                    }
                } else {
                    session()->flash('alert-danger', 'Image vide !!!!!!!!!!');
                    return redirect("/publish")
                        ->withInput();
                }
            }
        } else {
            return redirect('/mobile/home');
        }
    }

    public function showEditForm($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $publication = Publication::find($id);
            return view('publicationEdit', ['publication' => $publication]);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function sendEditDetailsForm($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $validator = \Validator::make(request()->all(), [
                "titre" => "required|max:50|min:2",
                "nbnum" => "required",
                "details" => "required|max:1000|min:10",
                "prix" => "required"
            ]);
            if ($validator->fails()) {
                return redirect("publication/edit/" . $id)
                    ->withInput()
                    ->withErrors($validator);
            } else {
                $publication = Publication::find($id);
                $publication->titre = request('titre');
                $publication->nbnum = request('nbnum');
                $publication->details = request('details');
                $publication->prix = request('prix');
                $publication->save();
                return redirect('/publication/' . $publication->id);
            }
        } else {
            return redirect('/mobile/home');
        }

    }

    public function sendEditphotoForm($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $publication = Publication::find($id);
            if ($publication != null) {
                if (request()->file("photo") != null) {
                    $pattern = '/image/';
                    $file = Input::file('photo');
                    if (!preg_match($pattern, $file->getMimeType())) {
                        session()->flash('alert-danger', "L'image n'est pas valide");
                        return redirect('/publication/' . $id);
                    } else {
                        $path = 'images';
                        $ext = $file->getClientOriginalExtension();
                        $date = Carbon::now()->format('YmdHys');
                        $name = $date . "." . $ext;
                        $img = \Intervention\Image\Facades\Image::make($file->getRealpath());
                        $img->resize(420, 594)->save($path . "/" . $name);
                        $publication->photo = $name;
                        $publication->save();
                        return redirect('/publication/' . $id);
                    }
                } else {
                    session()->flash('alert-danger', 'Image vide !!!!!!!!!!');
                    return redirect("/publication/" . $id)
                        ->withInput();
                }
            } else {
                return redirect('/home');
            }

        } else {
            return redirect('/mobile/home');
        }
    }

    public function listPubs()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $publications = Publication::orderBy('created_at', 'desc')->paginate(12);
            return view('publishList', ['publications' => $publications]);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function detailPublication($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $publication = Publication::find($id);
            return view('publication', ['publication' => $publication]);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function autocomplete()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $term = Input::get('term');

            $results = array();

            $queries = Publication::where('titre', 'LIKE', '%' . $term . '%')->take(5)->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->titre];
            }
            return response()->json($results);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function search()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $titre = request('q');
            $publications = Publication::where('titre', 'LIKE', '%' . $titre . '%')->orderBy('created_at', 'desc')->paginate(12);
            if($publications == null){
                session()->flash('alert-danger', 'Aucun résultat');
            }else{
                return view('publishList', ['publications' => $publications]);
            }
        } else {
            return redirect('/mobile/home');
        }
    }
}
