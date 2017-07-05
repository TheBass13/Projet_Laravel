@extends('layouts.app')

@section('css')
    <link href="/public/css/customer.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 toppad">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$user->name}}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-10 col-lg-10 ">
                            <table class="table table-user-information">
                                <br>
                                <tbody>
                                <tr>
                                    <td>Nom:</td>
                                    <td>{{$fiche->lastname}}</td>
                                </tr>
                                <tr>
                                    <td>Prénon:</td>
                                    <td>{{$fiche->firstname}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{$user->email}}</td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Date de naissance:</td>
                                    <td>{{Carbon\Carbon::parse($fiche->birthdate)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Lieu de naissance:</td>
                                    <td>{{$fiche->birthplace}}</td>
                                </tr>
                                <tr>
                                    <td>Adress:</td>
                                    <td>{{$fiche->adress}}</td>
                                </tr>
                                <tr>
                                    <td>Ville</td>
                                    <td>{{$fiche->city}}</td>
                                </tr>
                                <tr>
                                    <td>Pays:</td>
                                    <td>{{$fiche->country}}</td>
                                </tr>
                                <td>Téléphone:</td>
                                <td>{{$fiche->phone}}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{url('customer/editform/' . $user->id)}}" data-original-title="Modifier l'utilisateur"
                       data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i
                                class="glyphicon glyphicon-pencil"></i></a>
                </div>
            </div>
            <div class="col-lg-12">
                <form class="form-horizontal" role="form" method="post" action={{url('historyAdd/' . $user->id)}}>
                    {{ csrf_field() }}
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ajouter une prise de contact par : </h3>
                            {!! Form::select('type', ['phone' => 'Telephone', 'email' => 'Courrier électronique', 'letter' => 'Courrier']) !!}
                        </div>
                        <div class="panel-body" style="margin-left: 10px">

                            <div style="margin-right: 1px"
                                 class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content">Commentaire</label>
                                <input id="content" type="text" class="form-control" name="content">
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <br>
                        <div class="panel-footer">
                            <div class="form-group" style="margin-left: auto">
                                <button type="submit" class="btn btn-primary blue">
                                    <i class="fa fa-btn fa-user"></i> Enregistrer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Historique de contact</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-user-information">
                        <tbody>
                        <td><b>Commentaire</b></td>
                        <td><b>Méthode</b></td>
                        <td><b>Date</b></td>
                        @foreach($fiche['histories'] as $history)
                            <tr>
                                <td>{{$history->content}}</td>
                                <td>
                                    @if($history->type == 'phone')
                                        <i class="material-icons">call</i>
                                    @elseif($history->type == 'email')
                                        <i class="material-icons">message</i>
                                    @elseif($history->type == 'letter')
                                        <i class="material-icons">email</i>
                                    @endif
                                </td>
                                <td>{{$history->created_at->format('\L\e d/m/Y')}}</td>
                                <div style="display: inline-block"></div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $fiche['histories']->links() }}
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Abonnements</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-user-information">
                                <tbody>
                                <div class="table-responsive">
                                    <table class="table user-list">
                                        <thead>
                                        <tr>
                                            <th><span>Titre</span></th>
                                            <th><span>Abonné depuis</span></th>
                                            <th><span>Statuts</span></th>
                                            <th><span>Date de paiement</span></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($fiche['subscriptions']->count() == 0 )
                                            <div class="row">
                                                <div class="left">
                                                    <h6 class="alert alert-danger center right-align red-text">
                                                        Aucun
                                                        abonnement
                                                    </h6>
                                                </div>
                                            </div>
                                        @else
                                            @foreach($fiche['subscriptions'] as $subscription)
                                                <tr>
                                                    <td>
                                                        <a href="{{url('publication/' . $subscription->publication->id)}}"
                                                           class="user-link"
                                                           hreflang="">{{$subscription->publication->titre}}</a>
                                                    </td>
                                                    <td>{{$subscription->created_at->format('\L\e d/m/Y')}}</td>
                                                    <td class="text-center">
                                                        @if($subscription->payed == false)
                                                            <span class="label label-default">En attente de paiement</span>
                                                        @else
                                                            <span class="label label-default">Payé</span>
                                                        @endif
                                                    </td>
                                                    @if($subscription->payed == true)
                                                        <td>
                                                            Payé {{$fiche['payment'][$subscription->id]->created_at->format('\l\e d/m/Y')}}</td>
                                                    @else
                                                        <td>Aucune date de paiement</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                </tbody>
                            </table>
                            {{ $fiche['histories']->links() }}
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/customer.js') }}"></script>
    <script src="{{ asset('js/subscription.js') }}"></script>
@endsection