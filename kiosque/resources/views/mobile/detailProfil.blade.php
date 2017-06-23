@extends('layouts.mobileLayout')

@section('content')
    <div class="text-center">
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="left">    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <h6 class="alert alert-{{ $msg }} center right-align red-text">{{ Session::get('alert-' . $msg) }}
                                            <a href=""><i
                                                        class="material-icons small">fermer</i></a>
                                        </h6>
                                    @endif
                                @endforeach</div>
                        </div>
                        @foreach($detailProfil as $detailProfil)
                            <ul class="collection with-header">
                                <li class="collection-header"><h4>Informations</h4></li>
                                <li class="collection-item"><b>Nom : </b>{{ $detailProfil['lastname'] }}</li>
                                <li class="collection-item"><b>Prenom : </b>{{ $detailProfil['firstname'] }}</li>
                                <li class="collection-item"><b>Dat de naissance : </b>{{ $detailProfil['birthdate'] }}</li>
                                <li class="collection-item"><b>Lieu de naissance : </b>{{ $detailProfil['birthplace'] }}</li>
                                <li class="collection-item"><b>Adresse : </b>{{ $detailProfil['adress'] }}</li>
                                <li class="collection-item"><b>Ville : </b>{{ $detailProfil['city'] }}</li>
                                <li class="collection-item"><b>Code postal : </b>{{ $detailProfil['zipcode'] }}</li>
                                <li class="collection-item"><b>Pays : </b>{{ $detailProfil['country'] }}</li>
                                <li class="collection-item"><b>Numéro de téléphone : </b>{{ $detailProfil['phone'] }}</li>
                                <li class="collection-item"><b>Email : </b>{{ $detailProfil['email'] }}</li>
                            </ul>
                            <a class="waves-effect waves-light btn" href="/mobile/listPublication">Retour</a>
                            <a class="waves-effect waves-light btn" href="/mobile/detailProfil/{{ $detailProfil['id'] }}/edit">Editer Profil</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
