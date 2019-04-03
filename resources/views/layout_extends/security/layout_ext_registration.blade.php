@extends('layout')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_body')

    <h1>{{ $title }}</h1>

    <p>ici insérer formulaire d'inscription en html au lieu de form_widget</p>

    <form action="" class="row">

        <div class="col-sm-4 border border-light rounded">
            <h2>Connexion</h2>
            <div class="form-group">
                <label class="col-sm-6" for="user_signup_email">Votre Email</label>
                <input type="email" class="form-control col-sm-6" name="user_signup_email" id="user_signup_email" placeholder="aaa@aaa.com">
            </div>
            <div class="form-group">
                <label class="col-sm-6" for="user_signup_password">Choisissez un mot de passe</label>
                <input class="col-sm-6" type="password" name="user_signup_password" id="user_signup_password">
            </div>
        </div>

        <div class="col-sm-4 border border-light rounded">
            <h2>Infos publique</h2>
        </div>
        
        <div class="col-sm-4 border border-light rounded">
            <h2>Informations affichées lors de la vente</h2>
        </div>

    </form>

@endsection


