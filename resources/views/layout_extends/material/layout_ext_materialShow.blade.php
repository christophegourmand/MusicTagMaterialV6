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
        <div class="col-md-2 border border-light rounded"> ici les tags</div>
        <!-- ========================================= MATERIAL ================================== -->
        <div class="col-md-8 border border-light rounded p-4">
            
            <div class="row text-white">
                <div class="col-md-8">
                    <div class="col-md-7 bg-danger">
                        <h3>
                            {{$materialToShow->brand->name}}
                        </h3>
                    </div>
                    <div class="col-md-12 p-0">
                        <h3>
                            {{$materialToShow->productmodel}}
                        </h3>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <div class="">
                        <h3>Ville</h3>
                    </div>
                    <div class="">
                        <h3>{{$materialToShow->price}} €</h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-7">
                <img src="https://via.placeholder.com/400" alt="">
<!--                
                    <div class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="..." alt="First slide">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="..." alt="second slide">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="..." alt="third slide">
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
                    </div>
-->
                </div>
                <div class="col-md-5">
                    {{$materialToShow->description}}
                </div>
            </div>
        </div>
        
        <!-- ========================================= TUTOS ================================== -->
        <div class="col-md-2 border border-light rounded"> 
            ici les tutos
        </div>
    </div>
</div>

@endsection

@section('layout_block_customJavascripts')
@endsection
