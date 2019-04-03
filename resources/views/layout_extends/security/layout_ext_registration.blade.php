@extends('layout')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_body')

    <h1>{{ $title }}</h1>

    <p>ici insérer formulaire d'inscription en html au lieu de form_widget</p>

    <form action="">
        <div class="d-sm-flex flex-column flex-md-row justify-content-arround">
            <div class="col m-2 border border-light rounded">
                <h2>Connexion</h2>
                <div class="form-group">
                    <label class="" for="user_signup_email">Votre Email</label>
                    <input class="form-control" type="email" name="user_signup_email" id="user_signup_email" placeholder="aaa@aaa.com">
                </div>
                <div class="form-group">
                    <label class="" for="user_signup_password">Choisissez un mot de passe</label>
                    <input class="form-control" type="password" name="user_signup_password" id="user_signup_password">
                </div>
            </div>
    
            <div class="col m-2 border border-light rounded">
                <h2>Infos publique</h2>
            </div>
            
            <div class="col m-2 border border-light rounded">
                <h2>Informations affichées lors de la vente</h2>
            </div>
        </div>

        <input class="btn btn-danger w-100 mt-3" type="submit" value="Enregistrer">

    </form>

@endsection


