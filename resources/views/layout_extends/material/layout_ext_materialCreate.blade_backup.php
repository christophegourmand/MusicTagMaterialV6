@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
@endsection

@section('content')

<h2 class="text-center pb-3">Création d'une annonce</h2>

<div class="container-fluid">
    <!-- <form method="POST" action="{{ url('/material/create') }}" enctype="multipart/form-data"> -->

        <form method="{{ $submitActionMethod }}" action="{{ $submitActionRoute }}" enctype="multipart/form-data">

        @csrf

        <!-- TODO : ICI AJOUTER CHAMPS 'MARQUE/FABRICANT', Attention, on doit pouvoir en choisir plusieurs -->

        <div class="form-group row">
            <label for="material_brand_id" class="col-md-4 col-form-label text-md-right">{{ __('marque*') }}</label>
            <div class="col-md-6">    
                <select id="material_brand_id" class="form-control" name="material_brand_id">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach()
                </select>

                
                @if ($errors->has('material_brand_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_brand_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group row">
            <label for="material_material_productmodel" class="col-md-4 col-form-label text-md-right">{{ __('Modèle/référence du matériel*') }}</label>
            <div class="col-md-6">
                <input id="material_productmodel" type="text" class="form-control" name="material_productmodel" value="{{ old('material_productmodel') }}" required autofocus>
                @if ($errors->has('material_productmodel'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_productmodel') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="material_material_builtyear" class="col-md-4 col-form-label text-md-right">{{ __('Date de fabrication') }}</label>
            <div class="col-md-6">
                <input id="material_builtyear" type="date" class="form-control" name="material_builtyear" value="{{ old('material_builtyear') }}" autofocus>
                @if ($errors->has('material_builtyear'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_builtyear') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="material_description" class="col-md-4 col-form-label text-md-right">Description :</label>
            <div class="col-md-6">
                <textarea id="material_description" name="material_description" class="form-control" rows="5">{{ old('material_description') }}</textarea>
                @if ($errors->has('material_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="material_price" class="col-md-4 col-form-label text-md-right">{{ __('Prix*') }}</label>
            <div class="col-md-6">
                <input id="material_price" type="number" class="form-control" name="material_price" value="{{ old('material_price') }}" required autofocus>
                @if ($errors->has('material_price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-danger">
                    {{ __('Enregistrer et mettre en vente') }}
                </button>
            </div>
        </div>
        
    </form>
</div>

@endsection

@section('layout_block_customJavascripts')
@endsection