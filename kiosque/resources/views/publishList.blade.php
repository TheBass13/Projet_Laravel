@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Les publications</h3>
                    <br>
                    {{ Form::open(['url' => ['search/publication'], 'method' => 'GET']) }}
                    {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Entrer le titre'])}}
                    {{ Form::submit('Search', array('class' => 'btn btn-primary btn-sm')) }}
                    {{ Form::close() }}
                </div>
                <div class="panel-body">
                    <table class="table table-user-information">
                        <tbody>
                        <div class="row">
                            <div class="left">
                                @if($publications->all() == null)
                                    <h6 class="alert alert-danger} center right-align red-text">Aucun résultat</h6>
                                @endif
                            </div>
                        </div>
                        @foreach($publications as $publication)
                            <div class="col-sm-2 col-md-2">
                                <a href='{{url('publication/' . $publication->id)}}'>
                                    <img src={{url('images/' . $publication->photo)}}
                                            alt="" class="img-rounded img-responsive"/>
                                    <div class="text">{{$publication->titre}}</div>
                                </a>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $publications->links() }}
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#q").autocomplete({
                source: "{{ url('search/autocomplete/publication') }}",
            });
        });
    </script>

@endsection