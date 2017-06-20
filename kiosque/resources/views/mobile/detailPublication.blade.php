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
            @foreach($detailPublication as $detailPublication)
                <div class="center valign-wrapper">
                    <div class="col s12 m7">
                        <div class="card medium">
                            <div class="card-image">
                                <img src="/images/office.jpg">
                                <span class="card-title"><h4><b>{{ $detailPublication['titre'] }}</b></h4></span>
                            </div>
                            <div class="card-content">
                                <p>{{ $detailPublication['details'] }}</p>
                            </div>
                            <div class="card-action">
                                <a href="/mobile/listPublication">Retour</a>
                                <a href="#">S'abonner</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection


