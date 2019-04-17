@extends('layouts.app')

@section('content')
    <div class="col-md-12 border border-white pb-2">
        <h2 class="mb-5">Annonces Récentes</h2>

        <div class="container">

            <div class="row">
                @foreach($materials as $material)
                    <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($material->photos as $photo)
                                        @if($loop->first)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="active"></li>
                                        @else 
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class=""></li>
                                        @endif
                                    @endforeach

                                </ol>
                                <div class="carousel-inner crop">
                                    @foreach($material->photos as $photo)
                                        @if($loop->first)
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="{{$photo->description}}" title="{{$photo->description}}" src="{{asset( 'storage/img/material/'.$photo->file )}}" data-holder-rendered="true">
                                            </div>
                                        @else
                                        <div class="carousel-item ">
                                            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="{{$photo->description}}" title="{{$photo->description}}" src="{{asset( 'storage/img/material/'.$photo->file )}}" data-holder-rendered="true">
                                        </div>
                                        @endif

                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Precedente</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Suivante</span>
                                </a>
                            </div>
                            <div class="card-body p-0">
                                <P class="my-0 pl-1 bg-danger text-white">{{ $material->brand->name }}</P>
                                <div class="p-1">
                                    <p class="my-0 text-dark h5">{{ $material->productmodel }}</p>
                                    <p class="descriptionAnnonce text-dark">{{ $material->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> {{-- fin des cartes produits --}}

        </div>
    </div>
@endsection