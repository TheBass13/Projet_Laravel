@extends('layouts.app')
@section('css')
    <link href="/css/text.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')
    <br>
    <h5 class="blue-text center-align">Les publications</h5>
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
                                                        class="material-icons small">close</i></a>
                                        </h6>
                                    @endif
                                @endforeach</div>
                        </div>
                        <div class="row">
                            @foreach($publication as $publication)
                                <div class="text-center">

                                    <div class="card small">
                                        <a href="#" class="card-title"><i
                                                    class="material-icons right blue-text">{{$publication->titre}}</i></a>
                                        <div class="card-content">
                                            <text style="word-wrap: break-word"
                                                  class="text-black">{{ $publication->details }}</text>
                                        </div>
                                        <div class="card-action">
                                            <div class="left">
                                                le {{ date('j/m/y',strtotime($publication->created_at)) }}
                                            </div>
                                        </div>
                                        <div class="card-reveal ">
                                            <span class="card-title"><i class="material-icons tiny right">close</i></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary blue">
                                        <i class="fa fa-btn fa-user"></i> Publier
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection