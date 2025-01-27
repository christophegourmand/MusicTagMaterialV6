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
    <form method="POST" action="{{ url('/material/create') }}">
        @csrf

        <!-- TODO : ICI AJOUTER CHAMPS 'MARQUE/FABRICANT', Attention, on doit pouvoir en choisir plusieurs -->

        <div class="form-group row">
            <label for="productmodel" class="col-md-4 col-form-label text-md-right">{{ __('Modèle/référence du matériel*') }}</label>
            <div class="col-md-6">
                <input id="productmodel" type="text" class="form-control" name="productmodel" value="{{ old('productmodel') }}" required autofocus>
                @if ($errors->has('productmodel'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('productmodel') }}</strong>
                    </span>
                @endif
            </div>
            
        </div>
        
        <div class="form-group row">
            <label for="builtyear" class="col-md-4 col-form-label text-md-right">{{ __('Date de fabrication') }}</label>
            <div class="col-md-6">
                <input id="builtyear" type="date" class="form-control" name="builtyear" value="{{ old('builtyear') }}" autofocus>
                @if ($errors->has('builtyear'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('builtyear') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description:') }}</label>
            <div class="col-md-6">
                <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix*') }}</label>
            <div class="col-md-6">
                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
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
