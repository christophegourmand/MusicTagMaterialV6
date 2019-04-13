@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    <style>
        div{
            /* border: 1px solid blue; */
        }
    </style>
@endsection


@section('content')
<div class="container-fluid">
    <h1>{{ $title }}</h1>

    <form method="{{ $submitActionMethod }}" action="{{ $submitActionRoute }}">
        @csrf
        <div class="row ">
            <!-- remettre au dessus align-items-center  ET EVENTUELLEMENT justify-content-around -->

            <div class="col"></div>
            <!-- ========== -->
            <div class="col-md-4 m-3 m-md-4 border border-light rounded">
                <h2>Infos Publiques</h2>
                <!-- .....................  -->
                <!-- .....................  -->
                <div class="form-group">
                    <label for="city" class="">{{ __('Ville *') }}</label>
                    <div class="">
                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}">
                        @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="zipcode" class="">{{ __('Codepostal *') }}</label>
                    <div class="">
                        <input id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode') }}">
                        @if ($errors->has('zipcode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="country" class="">{{ __('Pays *') }}</label>
                    <div class="">
                        <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}">
                        @if ($errors->has('country'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
            </div> <!-- end infos connexions-->
            <!-- ========== -->
            <div class="col"></div>
            <!-- ========== -->
            <div class="col-md-4 m-3 m-md-4 border border-light rounded">
                <h2>Informations que vous debloquerez pour l'acheteur</h2>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="firstname" class="">{{ __('Prénom*') }}</label>
                    <div class="">
                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                        @if ($errors->has('firstname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="lastname" class="">{{ __('Nom de famille*') }}</label>
                    <div class="">
                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="phone" class="">{{ __('Téléphone') }}</label>
                    <div class="">
                        <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="street" class="">{{ __('Adresse * (doit obligatoirement etre accomagne de ville, CP, pays)') }}</label>
                    <div class="">
                        <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" required autofocus>
                        @if ($errors->has('street'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('street') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <!-- that email will be sent at submit but will not be used -->
                <div class="form-group">
                    <label for="email" class="">{{ __('+Email * (deja renseigne)') }}</label>
                    <div class="">
                        <input id="email" type="text" readonly class="form-control bg-secondary" name="email" value="{{ $user->email }}">
                    </div>
                </div>
            </div>
            <!-- ========== -->
            <div class="col"></div>
        </div>
        
        <input class="btn btn-danger w-100 mt-3" type="submit" value="Enregistrer">
        
    </form>
</div>
<!-- ########################################################################## -->
<!-- ########################################################################## -->
<!-- ########################################################################## -->
@endsection

@section('layout_block_customJavascripts')
    <script>
    $(document).ready(function() {
        
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }
        
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        $(".file-upload").on('change', function(){
            readURL(this);
        });
        
        $(".upload-button").on('click', function() {
        $(".file-upload").click();
        });
    });
    </script>
@endsection