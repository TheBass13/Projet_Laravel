@extends('layouts.app')

@section('css')
    <link href="/public/css/publication.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/public/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/public/css/customer.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Ajouter une publication</div>
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
                        <form class="form-horizontal" role="form" method="post" action="{{ url('/publish/send') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                                <label for="titre" class="col-md-4 control-label">titre</label>

                                <div class="col-md-6">
                                    <input id="titre" type="text" class="form-control" name="titre"
                                           value="{{old('titre')}}">
                                    @if ($errors->has('titre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('nbnum') ? ' has-error' : '' }}">
                                <label for="nbnum" class="col-md-4 control-label">Nombres de numéros à l'année</label>

                                <div class="col-md-6">
                                    <input id="nbnum" type="number" class="form-control" name="nbnum"
                                           value="{{old('nbnum')}}">

                                    @if ($errors->has('nbnum'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nbnum') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label for="details" class="col-md-4 control-label">Résumé</label>

                                <div class="col-md-6">
                                    {{ Form::textarea('details', $value = old('details'), ['class' => 'materialize-textarea col-md-12', 'id=details', 'length="1000"'] )}}
                                    @if ($errors->has('details'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('prix') ? ' has-error' : '' }}">
                                <label for="prix" class="col-md-4 control-label">Prix</label>

                                <div class="col-md-6">
                                    <input id="prix" type="number" class="form-control" name="prix"
                                           value="{{old('prix')}}">

                                    @if ($errors->has('prix'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prix') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group pull-right">
                                <div>Photo de couverture</div>
                                <div>{!! Form::file('photo', ['accept' => 'image/*']) !!}</div>
                            </div>
                            <br>
                            <div class="center">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary blue">
                                            <i class="fa fa-btn fa-user"></i> Publier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/public/js/materialize.js"></script>
    <script src="/public/js/init.js"></script>
@endsection