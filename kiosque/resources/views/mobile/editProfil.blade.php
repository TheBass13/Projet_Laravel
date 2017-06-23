@extends('layouts.mobileLayout')

@section('content')
    <div class="text-center">
        <h1>Mise à jour du profil : </h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Information</b></div>
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/mobile/editProfil/') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nom d'utilisateur</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $detailProfil['name']  }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname" class="col-md-4 control-label">Nom</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $detailProfil['lastname']  }}">

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname" class="col-md-4 control-label">Prénom</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $detailProfil['firstname']  }}">

                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                    <label for="birthdate" class="col-md-4 control-label">Date de naissance</label>

                                    <div class="col-md-6">
                                        <input id="birthdate" type="text" class="form-control" name="birthdate" value="{{ $detailProfil['birthdate']  }}">

                                        @if ($errors->has('birthdate'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birthplace') ? ' has-error' : '' }}">
                                    <label for="birthplace" class="col-md-4 control-label">Lieu de naissance</label>

                                    <div class="col-md-6">
                                        <input id="birthplace" type="text" class="form-control" name="birthplace" value="{{ $detailProfil['birthplace']  }}">

                                        @if ($errors->has('birthplace'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('birthplace') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('adress') ? ' has-error' : '' }}">
                                    <label for="adress" class="col-md-4 control-label">Adresse</label>

                                    <div class="col-md-6">
                                        <input id="adress" type="text" class="form-control" name="adress" value="{{ $detailProfil['adress']  }}">

                                        @if ($errors->has('adress'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('adress') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city" class="col-md-4 control-label">Ville</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="city" value="{{ $detailProfil['city']  }}">

                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                    <label for="zipcode" class="col-md-4 control-label">Code postal</label>

                                    <div class="col-md-6">
                                        <input id="zipcode" type="number" class="form-control" name="zipcode" value="{{ $detailProfil['zipcode']  }}">

                                        @if ($errors->has('zipcode'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country" class="col-md-4 control-label">Pays</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ $detailProfil['country']  }}">

                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Adresse E-mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $detailProfil['email']  }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Telephone</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control" name="phone" value="{{ $detailProfil['phone']  }}">

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="text-center">
                                        <div class="col-md-6 col-md-offset-4">
                                            <a class="waves-effect waves-light btn" href="/mobile/detailProfil/{{ $detailProfil['id'] }}/detail">Retour</a>
                                            <button type="submit" class="btn btn-primary blue">
                                                <i class="fa fa-btn fa-user"></i> Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
