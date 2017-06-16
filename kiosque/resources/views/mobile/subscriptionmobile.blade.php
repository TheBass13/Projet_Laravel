@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Liste des abonnements</h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <div class="col-sm-4 text-center" style="">
                    <div class="content-holder">
                        <div class="img-div"><img src="http://placehold.it/100x100" alt=""></div>
                        <br>
                        <div class="text-div">Text 1</div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-4 text-center" style="">
                    <div class="content-holder">
                        <div class="img-div"><img src="http://placehold.it/100x100" alt=""></div>
                        <br>
                        <div class="text-div">Text 2</div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-4 text-center" style="">
                    <div class="content-holder">
                        <div class="img-div"><img src="http://placehold.it/100x100" alt=""></div>
                        <br>
                        <div class="text-div">Text 3</div>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
