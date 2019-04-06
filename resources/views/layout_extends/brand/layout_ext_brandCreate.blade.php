@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
@endsection

@section('content')

<h2 class="text-center pb-3">Création d'une Marque</h2>

<div class="container-fluid">
    <form method="POST" action="{{ url('/brands') }}">
        @csrf

        <!-- TODO : ICI AJOUTER CHAMPS 'MARQUE/FABRICANT', Attention, on doit pouvoir en choisir plusieurs -->

        <div class="form-group row">
            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __('Name de la marque*') }}</label>
            <div class="col-md-6">
                <input id="brand_name" type="text" class="form-control" name="brand_name" value="{{ old('brand_name') }}" required autofocus>
                @if ($errors->has('brand_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('brand_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <p class="col-md-4 col-form-label text-md-right">Logo de la marque</p>

            <div class="col-md-6">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="brand_photolink" name="brand_photolink" >
                    @if ($errors->has('brand_photolink'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_photolink') }}</strong>
                        </span>
                    @endif
                    <label class="custom-file-label" for="brand_photolink">Ajouter un image</label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-danger">
                    {{ __('Enregistrer') }}
                </button>
            </div>
        </div>
        
    </form>
</div>

@endsection

@section('layout_block_customJavascripts')
@endsection
