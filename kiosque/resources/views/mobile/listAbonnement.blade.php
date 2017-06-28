@extends('layouts.mobileLayout')

@section('css')
    <link href="/public/css/publication.css" type="text/css" rel="stylesheet" media="screen,projection"/><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="left">    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <h6 class="alert alert-{{ $msg }} center right-align red-text">{{ Session::get('alert-' . $msg) }}
                        <a href=""><i
                                    class="material-icons small">close</i></a>
                    </h6>
                @endif
            @endforeach</div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($subscriptions as $subscriptions)
                <div class="card large">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="/images/office.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><a href="/mobile/getPublicationWithId/{{ $subscriptions['id'] }}"><h4><b>{{ $subscriptions['titre'] }}</b></h4></a><i class="material-icons right">more_vert</i></span>
                        <p><b>Nombre de magazin par an :</b> {{ $subscriptions['nbnum'] }}\an</p>
                        <p><b>Prix :</b> {{ $subscriptions['prix'] }}€</p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4" > <h4><b>Details :</b></h4><i class="material-icons right">close</i></span>
                        <p>{{ $subscriptions['details'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection

