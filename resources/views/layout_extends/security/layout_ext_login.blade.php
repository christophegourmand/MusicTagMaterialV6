@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection


@section('content')
    <div class="container-fluid">    
        <h1>{{ $title }}</h1>

        <p>ici insérer formulaire d'inscription en html au lieu de form_widget</p>

        <form action="">
            <div class="d-flex flex-column">
                <div class="col m-2 border border-light rounded">
                    <h2>Connexion</h2>
                    <div class="form-group">
                        <label class="" for="user_signin_email">Entrez votre email de connexion</label>
                        <input class="form-control" type="email" name="user_signin_email" id="user_signin_email" placeholder="aaa@aaa.com">
                    </div>
                    <div class="form-group">
                        <label class="" for="user_signin_password">Tapez votre mot de passe</label>
                        <input class="form-control" type="password" name="user_signin_password" id="user_signin_password">
                    </div>
                </div>

            </div>

            <input class="btn btn-danger w-100 mt-3" type="submit" value="Enregistrer">

        </form>
    </div>
@endsection





