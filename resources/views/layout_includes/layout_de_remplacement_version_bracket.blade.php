<nav class="navbar navbar-expand-lg navbar-dark bg-brownDarkLeather">
    <a class="navbar-brand txt-brownLight" href="path('home')">MusicTagMaterial</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToCollapse" aria-controls="navbarToCollapse"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- ci dessous je met l'id 'navbarToCollapse' pour que jQuery de Bootstrap le mette en menu burger-->
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

        @section('header_block_account')
            <div class="navbar-nav">
                <a class="nav-item nav-link btn btn-warning text-light mx-1 bg-yellowLight text-dark" href="/inscription">Se Connecter</a>
                <a class="nav-item nav-link btn btn-danger text-light mx-1 bg-redDark" href="/inscription">Créer un compte</a>
            </div>
        @endsection
    </div>
</nav>