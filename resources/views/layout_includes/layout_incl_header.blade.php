<!-- <nav class="navbar navbar-expand-md navbar-dark bg-brownDarkLeather">
    <a class="navbar-brand txt-brownLight" href="home">MusicTagMaterial</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToCollapse" aria-controls="navbarToCollapse"
        aria-expanded="false" aria-label="Bouton menu du site">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <!--? ci dessous je met l'id 'navbarToCollapse' pour que jQuery de Bootstrap le mette en menu burger-->
    <!-- 
    <div id="navbarToCollapse" class="collapse navbar-collapse flex flex-row justify-content-between">
        <div class="navbar-nav">

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle p-2 mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Catégories rapides</button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Batteries/percussions/pads</a>
                    <a class="dropdown-item" href="#">Claviers</a>
                    <a class="dropdown-item" href="#">Guitares</a>
                    <a class="dropdown-item" href="#">Micros</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Consoles</a>
                    <a class="dropdown-item" href="#">Enceintes</a>
                    <a class="dropdown-item" href="#">Interfaces Audio</a>
                    <a class="dropdown-item" href="#">Interfaces Midi</a>
                    <a class="dropdown-item" href="#">Software</a>
                </div>
            </div>
            
            <a class="nav-item nav-link btn btn-warning text-light mx-1" href="material_create">Vendre (à déplacer)</a>

        </div>
        @section("header_block_account")
    -->
            <!--
            <div class="navbar-nav">
                <a class="nav-item nav-link btn btn-warning text-light mx-1 bg-yellowLight text-dark" href="/inscription">Se Connecter</a>
                <a class="nav-item nav-link btn btn-danger text-light mx-1 bg-redDark" href="/inscription">Créer un compte</a>
            </div> 
            -->

            <!--FOSUSER: gestions des login, logout, déconnection: -->
    
    <!--         <div>
                ZONE LOGIN FOS
            </div>
        @endsection
    </div>
</nav>
-->



<!-- 
<ul class="ulVolante">
    <li><a href="http://localhost:8000/welcome">/welcome</a></li>
    <li><a href="http://localhost:8000/">/</a></li>
    <li><a href="http://localhost:8000/myaccount">/myaccount</a></li>
    <li><a href="http://localhost:8000/login">/login</a></li>
</ul>
 -->



 <nav class="navbar navbar-expand-md navbar-dark bg-brownDarkLeather">
            <div class="container-fluid">
                <a class="navbar-brand txt-brownLight" href="{{ url('/') }}"> MusicTagMaterial</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle p-2 mx-1" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Catégories rapides</button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Batteries/percussions/pads</a>
                                <a class="dropdown-item" href="#">Claviers</a>
                                <a class="dropdown-item" href="#">Guitares</a>
                                <a class="dropdown-item" href="#">Micros</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Consoles</a>
                                <a class="dropdown-item" href="#">Enceintes</a>
                                <a class="dropdown-item" href="#">Interfaces Audio</a>
                                <a class="dropdown-item" href="#">Interfaces Midi</a>
                                <a class="dropdown-item" href="#">Software</a>
                            </div>
                        </div>
                        
                        <!-- <a class="nav-item nav-link btn btn-warning text-light mx-1" href="material_create">Vendre (à déplacer)</a> -->
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle h4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>