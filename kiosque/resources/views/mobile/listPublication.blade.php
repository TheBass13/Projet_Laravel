@extends('layouts.mobileLayout')

@section('css')
    <link href="/css/comment.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
            @foreach($publications as $publications)
                <div class="card large">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="/images/office.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"> <h4><b>{{ $publications['titre'] }}</b></h4><i class="material-icons right">more_vert</i></span>
                        <p><b>Nombre de magazin par an :</b> {{ $publications['nbnum'] }}\an</p>
                        <p><b>Prix :</b> {{ $publications['prix'] }}€</p>
                    </div>
                    <div class="card-reveal">
                       <a href="/mobile/getPublicationWithId/{{ $publications['id'] }}"><span class="card-title grey-text text-darken-4" > <h4><b>Details :</b></h4><i class="material-icons right">close</i></span></a>
                        <p>{{ $publications['details'] }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection

