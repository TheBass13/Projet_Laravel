@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Les cients</h3>
                    <br>
                    {{ Form::open(['url' => ['search/customer'], 'method' => 'GET']) }}
                    {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Nom ou prénom'])}}
                    {{ Form::submit('Search', array('class' => 'btn btn-primary btn-sm')) }}
                    {{ Form::close() }}
                    <br>
                    <div class="action">
                        <a href="{{url('customer/historyForm')}}" type="button" methods="get"
                           class="btn btn-primary btn-sm">Ajout d'historique multiple
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <div class="row">
                            <div class="left">
                                @if($fiches->all() == null)
                                    <h6 class="alert alert-danger} center right-align red-text">Aucun résultat</h6>
                                @else
                                @endif
                            </div>
                        </div>
                        @foreach($fiches as $fiche)
                            <li class="list-group-item col-lg-4">
                                <div class="row">
                                    <div class="col-xs-10 col-md-11">
                                        <a href="{{url('customer/' . $fiche->user_id)}}"><h4
                                                    style="word-wrap: break-word">{{$fiche->user->name}}</h4>
                                        </a>
                                        <small><cite>{{$fiche->firstname}} {{$fiche->lastname}}</cite></small>
                                        <br>
                                        <small><cite>Créé
                                                {{$fiche->created_at->format('\l\e d/m/Y') }}</cite>
                                        </small>
                                    </div>
                                    <div class="action">
                                        <a href="{{url('customer/editform/' . $fiche->user_id)}}" type="button"
                                           class="btn btn-primary btn-xs" title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{ $fiches->links() }}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#q").autocomplete({
                source: "{{ url('search/autocomplete/customer') }}",
                minLength: 3,
                select: function (event, ui) {
                    $('#q').val(ui.item.value);
                }
            });
        });
    </script>

@endsection