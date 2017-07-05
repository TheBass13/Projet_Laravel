<?php

namespace App\Http\Controllers;

use App\Fiche;
use App\History;
use App\Payment;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function customerList()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $fiches = Fiche::orderBy('lastname')->paginate(12);

            return view('customerList', array('fiches' => $fiches));

        } else {
            return redirect('/mobile/home');
        }
    }

    public function autocomplete()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $term = Input::get('term');

            $results = array();

            $queries = Fiche::where('firstname', 'LIKE', '%' . $term . '%')
                ->orWhere('lastname', 'LIKE', '%' . $term . '%')
                ->take(5)->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->firstname . ' ' . $query->lastname];
            }
            return response()->json($results);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function search()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $string = request('q');

            $fiches = Fiche::where('firstname', 'LIKE', '%' . $string . '%')
                ->orWhere('lastname', 'LIKE', '%' . $string . '%')
                ->orderBy('lastname')->paginate(12);

            if ($fiches == null) {
                session()->flash('alert-danger', 'Aucun résultat');
            } else {
                if ($fiches->total() == 1) {
                    return redirect('/customer/' . $fiches[0]->user_id);
                }
                return view('customerlist', array('fiches' => $fiches));
            }

        } else {
            return redirect('/mobile/home');
        }
    }

    public function detailProfil($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $user = User::find($id);
            if ($user != null) {
                $fiche = Fiche::whereUserId($id)->first();
                $payments = [];
                $histories = History::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(4);
                $fiche['histories'] = $histories;
                $fiche['subscriptions'] = Subscription::whereUserId($id)->orderBy('payed')->paginate('6');

                foreach($fiche['subscriptions'] as $subscription)
                {
                    $payments[$subscription->id] = Payment::whereUserId($id)->whereSubscriptionId($subscription->id)->first();
                }

                $fiche['payment'] = $payments;
                return view('customerProfil', ['user' => $user], ['fiche' => $fiche]);
            } else {
                session()->flash('alert-danger', 'Utilisateur inconnu');
                return redirect('/home');
            }
        } else {
            return redirect('/mobile/home');
        }
    }

    public function editForm($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $user = User::find($id);
            $fiche = Fiche::whereUserId($user->id)->first();
            return view('customerEdit', ['user' => $user], ['fiche' => $fiche]);
        } else {
            return redirect('/mobile/home');
        }
    }

    public function editProfil($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $validator = \Validator::make(request()->all(), [
                'email' => 'required|email',
                'name' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'adress' => 'required',
                'country' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'phone' => 'required',
                'birthplace' => 'required',
                'birthdate' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('customer/editform/' . $id)
                    ->withInput()
                    ->withErrors($validator);
            } else {
                $user = User::find($id);
                if ($user != null) {
                    $fiche = Fiche::whereUserId($id)->first();

                    if ($user->email == request('email')) {
                        $user->name = request('name');
                        $fiche->firstname = request('firstname');
                        $fiche->lastname = request('lastname');
                        $fiche->adress = request('adress');
                        $fiche->country = request('country');
                        $fiche->city = request('city');
                        $fiche->zipcode = request('zipcode');
                        $fiche->phone = request('phone');
                        $fiche->birthplace = request('birthplace');
                        $fiche->birthdate = request('birthdate');
                        $user->save();
                        $fiche->save();
                    } else {
                        if (User::whereEmail(request('email'))->first()) {
                            session()->flash('alert-danger', 'Email déjà utilisé');
                            return redirect('customer/editform/' . $id);
                        } else {
                            $user->name = request('name');
                            $user->email = request('email');
                            $fiche->firstname = request('firstname');
                            $fiche->lastname = request('lastname');
                            $fiche->adress = request('adress');
                            $fiche->country = request('country');
                            $fiche->city = request('city');
                            $fiche->zipcode = request('zipcode');
                            $fiche->phone = request('phone');
                            $fiche->birthplace = request('birthplace');
                            $fiche->birthdate = request('birthdate');
                            $user->save();
                            $fiche->save();
                        }
                    }

                    return redirect('/customer/' . $id);
                } else {
                    session()->flash('alert-danger', 'Utilisateur inconnu');
                    return redirect('/home');
                }
            }
        } else {
            return redirect('/mobile/home');
        }
    }

    public function addHistory($id)
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $validator = \Validator::make(request()->all(), [
                'content' => 'required|max:100',
            ]);
            if ($validator->fails()) {
                return redirect('/customer/' . $id)
                    ->withInput()
                    ->withErrors($validator);
            } else {
                $data = request()->all();
                history::create([
                    'content' => $data['content'],
                    'user_id' => $id,
                    'type' => $data['type'],
                ]);
                return redirect('/customer/' . $id);
            }
        } else {
            return redirect('/mobile/home');
        }
    }

    public function addMultiHistoForm()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $fiches = Fiche::orderBy('lastname')->paginate(9);
            return view('addMultiHistoForm', array('fiches' => $fiches));

        } else {
            return redirect('/mobile/home');
        }
    }

    public function sendMultiHistoForm()
    {
        if (auth()->user()['original']['isemploye'] == true) {

            $validator = \Validator::make(request()->all(), [
                'content' => 'required|max:100',
            ]);
            if ($validator->fails()) {
                return redirect('customer/historyForm')
                    ->withInput()
                    ->withErrors($validator);
            }

            $datas = request()->all();
            $content = $datas['content'];
            $type = $datas['type'];
            unset($datas['content']);
            unset($datas['type']);
            unset($datas['_token']);
            if ($datas == null) {
                session()->flash('alert-danger', 'Aucun utilisateur sélectionné');
                return redirect('customer/historyForm')->withInput();
            }

            $i = 0;

            foreach ($datas as $data) {
                history::create([
                    'content' => $content,
                    'user_id' => $data,
                    'type' => $type,
                ]);
                $i++;
            }

            session()->flash('alert-success', 'Prises de contact enregistrées : ' . $i);
            return redirect(url('customer/historyForm'));

        } else {
            return redirect('/mobile/home');
        }
    }

    public function searchHisto()
    {
        if (auth()->user()['original']['isemploye'] == true) {
            $string = request('q');
            $fiches = Fiche::where('firstname', 'LIKE', '%' . $string . '%')
                ->orWhere('lastname', 'LIKE', '%' . $string . '%')
                ->orderBy('lastname')->paginate(9);

            if ($fiches == null) {
                session()->flash('alert-danger', 'Aucun résultat');
            } else {
                return view('addMultiHistoForm', array('fiches' => $fiches));
            }
        } else {
            return redirect('/mobile/home');
        }
    }
}