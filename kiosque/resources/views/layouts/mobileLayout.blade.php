<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Kiosque</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/general.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @yield('css')

<!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/public/js/materialize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <script src="/public/js/init.js"></script>

</head>
<body>
<main style="background-color: #EEEEEE">
    <nav class="darken-6" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="/mobile/listPublication" class="brand-logo">Kiosque</a>
            <ul class="right hide-on-med-and-down">
                @if (!session()->get('login'))
                    <li><a href="{{ url('/mobile/login') }}">Se connecter</a></li>
                    <li><a href="{{ url('/mobile/register') }}">Créer un compte</a></li>
                @else
                    <li><a href="/mobile/getSubscriptionWithId/{{ session()->get('user_id')}}">Abonnement</a></li>
                    <li><a href="/mobile/listPublication">Magazine</a></li>
                    <li><a href="/mobile/detailProfil/{{ session()->get('user_id')}}/detail"
                           class="center">{{ session()->get('user_name') }}</a></li>
                    <li>
                        <a href="{{ url('/mobile/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Deconnexion
                        </a>

                        <form id="logout-form" action="{{ url('/mobile/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <!-- Authentication Links -->
                @if (session()->get('login'))
                    <li class="dropdown">
                        <a href="/mobile/detailProfil/{{ session()->get('user_id')}}/detail" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ session()->get('user_name') }} <span class="caret"></span>
                        </a>
                    </li>

                    <li><a href="/mobile/listPublication">Magazine</a></li>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/mobile/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Deconnexion
                            </a>

                            <form id="logout-form" action="{{ url('/mobile/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @else
                    <li><a href="{{ url('/mobile/login') }}">Connexion</a></li>
                    <li><a href="{{ url('/mobile/register') }}">Enregistrement</a></li>
                @endif
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    @if(session('success'))
        <div class="container">
            <div class="row" id="alert_box">
                <div class="col s12 m12">
                    <div class="card green darken-1">
                        <div class="row">
                            <div class="col s12 m10">
                                <div class="card-content white-text">
                                    {{ session('success') }}
                                </div>
                            </div>
                            <div class="col s12 m2" style="text-align: right;color: white">
                                <i class="fa fa-times icon_style"                             id="alert_close" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if(session('error'))
        <div class="container">
            <div class="row" id="alert_box">
                <div class="col s12 m12">
                    <div class="card red darken-1">
                        <div class="row">
                            <div class="col s12 m10">
                                <div class="card-content white-text">
                                    {{ session('error') }}
                                </div>
                            </div>
                            <div class="col s12 m2" style="text-align: right;color: white">
                                <i class="fa fa-times icon_style"                             id="alert_close" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

</main>

<script>
    $(function(){
        $('#alert_close').click(function(){
            $( "#alert_box" ).fadeOut( "slow", function() {
            });
        });
    });
</script>
</body>


<footer style="background-color: #EEEEEE">
    @yield('pagination')
    @yield('footer')
    <footer class="page-footer">
        <div class="container center">
            <a class="white-text">© 2017 Copyright Esimed</a>
        </div>
    </footer>
</footer>
</html>