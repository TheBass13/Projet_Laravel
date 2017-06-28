@extends('layouts.mobileLayout')

@section('css')
    <link href="/css/publication.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
                    <div class="detailPublication">
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
                                <a class="waves-effect waves-light modal-trigger" href="#modal1">S'abonner</a>
                            </div>
                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                                <div class="modal-content">
                                    <h4>S'abonner</h4>
                                    <p>Êtes vous sûre de souscrire à cette abonnement ?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="/mobile/subscription/{{ $detailPublication['id'] }}" class=" modal-action modal-close waves-effect waves-green btn-flat">Valider</a>
                                    <a href="" class=" modal-action modal-close waves-effect waves-red btn-flat">Retour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(function(){
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });
        });
    </script>

@endsection



