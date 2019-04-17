@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- ========================================= TAGS ================================== -->
        <div class="col-lg-2 pt-4 pl-2 border border-light rounded">
            <h2>Tags</h2>
        </div>
        <!-- ========================================= MATERIAL ================================== -->
        <div class="col-lg-8 p-4 border border-light rounded">
            
            <div class="row text-white">
                <div class="col-lg-8 p-0">
                    <div class="col-lg-7 bg-danger">
                        <h3>
                            {{$brand->name}}
                        </h3>
                    </div>
                    <div class="col-lg-12 p-0">
                        <h3>
                            {{$material->productmodel}}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 text-right">
                    <div class="">
                        <h3>{{ $city->name }}</h3>
                    </div>
                    <div class="">
                        <h3>{{$material->price}} €</h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 p-0 border-brownYellow">
                    <img src="{{asset( $assetPath )}}" alt="Photo du produit" class="mw-100">
                    <!-- <img src="{{asset( 'storage/img/material/noimage.jpg' )}}" alt="Photo du produit" class="mw-100"> -->
               
                    
                    <!-- <div class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('storage/img/material/Gibson_sg-standard_01.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('storage/img/material/Gibson_sg-standard_02.jpg')}}" alt="second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('storage/img/material/Gibson_sg-standard_03.jpg')}}" alt="third slide">
                            </div>
                        </div>
                        
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> -->

                </div>
                <div class="col-lg-5 pt-3 border-brownYellow bg-brownDarkLeather text-brownYellow">
                    {{$material->description}}
                </div>
            </div>
        </div>
        
        <!-- ========================================= TUTOS ================================== -->
        <div class="col-lg-2 pt-4 pl-2 border border-light rounded"> 
            <h2>Tutos Liés</h2>
        </div>
    </div>
</div>

@endsection

@section('layout_block_customJavascripts')
    $('.carousel').carousel({
    interval: 1000
    })
@endsection
