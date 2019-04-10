@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
    <style>
        div{
            border:1px solid white;
            border-radius: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="display-4">Mon compte</h1>
        <div class="row">
            <div class="col-4">
                <h3 class="">Mes annonces</h3>
                <div class="row">
                    <div class="col-4">photo1</div>
                    <div class="col-4">photo2</div>
                    <div class="col-4">photo3</div>
                </div>
            </div>

            <div class="col-4">
                <h3 class="">Infos publiques</h3>
                <div>
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label for="">Pseudo</label>
                            <input type="text" name="" id="">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-4">
                <h3 class="">informations affichées lors de la vente</h3>
                
            </div>
        </div>
    </div>
@endsection

@section('layout_block_customJavascripts')
@endsection
