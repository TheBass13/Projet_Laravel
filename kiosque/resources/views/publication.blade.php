@extends('layouts.app')

@section('css')
    <link href="/public/css/publication.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div><img src="{{url('images/' . $publication->photo)}}"/></div>
                        </div>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{$publication->titre}}</h3>
                        <div class="rating">
                            <span class="review-no">41 reviews</span>
                        </div>
                        <br>
                        <p class="product-description" style="word-wrap: break-word"> {!! str_replace(array("\r\n","\n"),'<br>',$publication->details) !!}</p>
                        <br>
                        <h4 class="price">Prix : <span>{{$publication->prix}} Euros</span></h4>
                        <div class="action">
                            <a id="editDetails" href="{{url('publication/edit/' . $publication->id)}}"
                               class="add-to-cart btn btn-default" type="button">Modifier les details</a>
                            <br>
                            <br>
                            <br>
                            <form class="form-horizontal" role="form" method="post" action="{{ url('publication/editPhotoSend/' . $publication->id) }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Modifier la photo de couverture</h3>
                                    </div>
                                        <div class="left">    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                                @if(Session::has('alert-' . $msg))
                                                    <h6 class="alert alert-{{ $msg }} center right-align red-text">{{ Session::get('alert-' . $msg) }}
                                                        <a href=""><i
                                                                    class="material-icons small">close</i></a>
                                                    </h6>
                                                @endif
                                            @endforeach</div>
                                    <div class="panel-body">{!! Form::file('photo', ['accept' => 'image/*']) !!}</div>
                                    <div class="panel-footer">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary blue">
                                                    <i  class="fa fa-btn fa-user"></i> Publier
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/public/js/materialize.js"></script>
    <script src="/public/js/init.js"></script>
@endsection