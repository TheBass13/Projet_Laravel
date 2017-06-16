@extends('layouts.app')

@section('content')
    <br>
    <h5 class="blue-text center-align">Les défis</h5>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ route('sendPublish') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
                                <label for="titre" class="col-md-4 control-label">titre</label>

                                <div class="col-md-6">
                                    <input id="titre" type="text" class="form-control" name="titre">
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
                                    <input id="nbnum" type="number" class="form-control" name="nbnum">

                                    @if ($errors->has('nbnum'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nbnum') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo" class="col-md-4 control-label">Photo de couverture</label>

                                <div class="col-md-6">
                                    <input id="photo" type="text" class="form-control" name="photo">

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                <label for="details" class="col-md-4 control-label">Résumé</label>

                                <div class="col-md-6">
                                    <input id="details" type="text" class="form-control" name="details">
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
                                    <input id="prix" type="number" class="form-control" name="prix">

                                    @if ($errors->has('prix'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prix') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

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