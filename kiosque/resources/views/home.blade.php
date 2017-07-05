@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="row">
                        <div class="left">    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <h6 class="alert alert-{{ $msg }} center right-align red-text">{{ Session::get('alert-' . $msg) }}
                                        <a href=""><i
                                                    class="material-icons small">close</i></a>
                                    </h6>
                                @endif
                            @endforeach</div>
                        <div class="panel-body">
                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
