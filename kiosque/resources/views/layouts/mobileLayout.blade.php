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
    @yield('css')
</head>

<main style="background-color: #EEEEEE">
    <nav class="darken-6" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="/mobile/listPublication" class="brand-logo">Kiosque</a>
            <ul class="right hide-on-med-and-down">
                @if (!session()->get('login'))
                    <li><a href="{{ url('/mobile/login') }}">Se connecter</a></li>
                    <li><a href="{{ url('/mobile/register') }}">Créer un compte</a></li>
                @else
                    <li><a href="/mobile/listAbonnement">Abonnement</a></li>
                    <li><a href="/mobile/listPublication">Magazine</a></li>
                    <li><a href="/mobile/detailProfil/{{ session()->get('user_id')}}/detail"
                           class="center">{{ session()->get('user_name') }}</a></li>
                    <li>
                        <a href="{{ url('/mobile/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Se déconnecter
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
                    <li><a href="{{ url('/mobile/login') }}">Login</a></li>
                    <li><a href="{{ url('/mobile/register') }}">Register</a></li>
                @endif
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    @yield('content')
</main>

<footer style="background-color: #EEEEEE">
    @yield('pagination')
    @yield('footer')
    <footer class="page-footer">
        <div class="container center">
            <a class="white-text">© 2017 Copyright Esimed</a>
        </div>
    </footer>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="/public/js/materialize.js"></script>
<script src="/public/js/init.js"></script>

</html>