@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Votre Compte</h1>

    <p>ici insérer formulaire d'inscription en html au lieu de form_widget</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="d-sm-flex flex-column flex-md-row justify-content-arround">
            <!-- #####################################################  -->
            <div class="col border border-light rounded">
                <h2>Infos de Connexion</h2>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                    <div class="">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="password" class="">{{ __('Password') }}</label>
                    <div class="">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <!-- .....................  -->
                

            </div>
            <!-- #####################################################  -->
            
            <div class="col border border-light rounded">
                <h2>Infos publique</h2>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="name" class="">{{ __('Pseudo*') }}</label>
                        <div class="">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <!-- .....................  -->
                    <div class="col-6">
                        <div class="avatar-wrapper">
                            <img class="profile-pic" src="" />
                            <div class="upload-button">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </div>
                            <input class="file-upload" type="file" accept="image/*" id="avatar" name="avatar"/>
                            <label class="custom-file-label" for="avatar">Ajouter un image</label>
                            @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- .....................  -->
                <div class="form-group">
                    <label for="city" class="">{{ __('Ville*') }}</label>
                    <div class="">
                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>
                        @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                <label for="postalcode" class="">{{ __('Codepostal*') }}</label>
                    <div class="">
                        <input id="postalcode" type="text" class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" name="postalcode" value="{{ old('postalcode') }}" required>
                        @if ($errors->has('postalcode'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('postalcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
                <div class="form-group">
                    <label for="country" class="">{{ __('Pays*') }}</label>
                    <div class="">
                        <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required>
                        @if ($errors->has('country'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
            </div>
            
            <!-- #####################################################  -->
            <div class="col border border-light rounded">
                <h2>Infos affichées lors de la vente</h2>

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
                    <label for="street" class="">{{ __('Adresse*') }}</label>
                    <div class="">
                        <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" required>
                        @if ($errors->has('street'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('street') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <!-- .....................  -->
            </div>
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