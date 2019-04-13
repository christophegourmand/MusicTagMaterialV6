@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    <style>
        div{
            border: 1px solid blue;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-md-between p-4">
        <h1 class="text-center">{{ $title }}</h1>

        
        <a href="{{ route('page_seller_form') }}">
            <button type="button" class="btn btn-warning">Vendre du material</button>
        </a>
    </div>

    <h2>Bonjour {{$user->name}}, bienvenue dans votre espace</h2>

    <div class="row">
        <div class="col">
            <h3>Mes annonces</h3>
        </div>
        <!-- ==================  -->
        <div class="col">
            <h3>Mes infos personnelles</h3>

            <div class="">
                <p>{{$user->name}}</p>
            </div>

            <div class="">
                <p>{{$user->email}}</p>
            </div>
            
            <div class="">
                <p>{{$user->firstname}}</p>
            </div>
            
            <div class="">
                <p>{{$user->lastname}}</p>
            </div>
            
            <div class="">
                <p>{{$user->phone}}</p>
            </div>
            
            <div class="">
                <p>{{$user->avatar}}</p>
            </div>
            
            <div class="">
                <p>{{$user->address}}</p>
            </div>
            
            <div class="">
                <p>{{$user->city}}</p>
            </div>
            
            <div class="">
                <p>{{$user->zipcode}}</p>
            </div>
            <!--  
            -->
        </div>
        <!-- ==================  -->
        <div class="col">
            <h3>Mes informations affichees a l'acheteur</h3>
        </div>
    </div>

    


</div>


<!-- =============== CARD TO PRECISE IF YOU ARE LOGGED IN OR NOT ==========  -->

<!--
<div class="card text-dark">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>
-->
@endsection
