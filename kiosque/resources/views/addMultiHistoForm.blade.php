@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Les cients</h3>
                    <br>
                    {{ Form::open(['url' => ['search/customer/multihisto'], 'method' => 'GET']) }}
                    {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Nom ou prénom'])}}
                    {{ Form::submit('Search', array('class' => 'btn btn-primary btn-sm')) }}
                    {{ Form::close() }}
                </div>
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
                    <form class="form-horizontal" role="form" method="post" action={{url('customer/sendhistoryForm')}}>
                        {{ csrf_field() }}
                        <div class="panel panel-info">
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
                                <label for="type">Methode de contact</label>
                                {!! Form::select('type', ['phone' => 'Telephone', 'email' => 'Courrier électronique', 'letter' => 'Courrier']) !!}
                                <div class="form-group" style="margin-left: auto">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-btn fa-user"></i> Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-user-information">
                            <td style="max-width: 50px"><b>Séléctionner</b></td>
                            <td><b>Nom</b></td>
                            <td><b>prénom</b></td>
                            <td><b>Date de création</b>
                            <div class="hidden">{{$i = 1}}</div>
                            @if($fiches->all() == null)
                                <h6 class="alert alert-danger} center right-align red-text">Aucun résultat</h6>
                            @else
                            @endif
                            @foreach($fiches as $fiche)
                                <tr>
                                    <td>
                                        {{ Form::checkbox($i, $fiche->user_id,false , ['id' =>  $fiche->user_id])}}
                                    </td>
                                    <td>{{$fiche->lastname}}</td>
                                    <td>{{$fiche->firstname}}</td>
                                    <td>{{$fiche->created_at->format('\l\e d/m/Y') }}</td>
                                    <div style="display: inline-block"></div>
                                </tr>
                                <div class="hidden">{{$i++}}</div>
                            @endforeach
                        </table>
                    </form>
                    {{ $fiches->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
