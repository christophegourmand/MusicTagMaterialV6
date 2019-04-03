<nav class="navbar navbar-expand-lg navbar-dark bg-brownLeather">
    <a class="navbar-brand txt-brownLight" href="home">MusicTagMaterial</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToCollapse" aria-controls="navbarToCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--? ci dessous je met l'id 'navbarToCollapse' pour que jQuery de Bootstrap le mette en menu burger-->
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
            
            <a class="nav-item nav-link btn btn-warning text-white mx-1" href="material_create">Vendre (à déplacer)</a>

        </div>

        @section("header_block_account")

            <!--
            <div class="navbar-nav">
                <a class="nav-item nav-link btn btn-warning text-white mx-1 bg-yellowLight text-dark" href="/inscription">Se Connecter</a>
                <a class="nav-item nav-link btn btn-danger text-white mx-1 bg-redDark" href="/inscription">Créer un compte</a>
            </div> 
            -->

            <!--FOSUSER: gestions des login, logout, déconnection: -->
            <div>
                ZONE LOGIN FOS
            </div>
        @endsection

    </div>
</nav>

<ul class="ulVolante">
    <li><a href="http://localhost:8000/">/</a></li>
    <li><a href="http://localhost:8000/register">/register</a></li>
    <li><a href="http://localhost:8000/register/confirmed">register/confirmed</a></li>
    <li><a href="http://localhost:8000/login">/login</a></li>
    <li><a href="http://localhost:8000/moncompte">/moncompte (mien)</a></li>
    <li><a href="http://localhost:8000/profile">/profile</a></li>
    <li><a href="http://localhost:8000/profile/edit">/profile/edit</a></li>
    <li><a href="http://localhost:8000/profile/change-password">/profile/change-password</a></li>
</ul>