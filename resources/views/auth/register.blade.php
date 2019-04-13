@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Creation du compte</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <!-- #####################################################  -->
            <div class="col"></div>
            <div class="col-md-4 m-3 m-md-4 border border-light rounded">
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
            </div> <!-- end infos connexions-->
            <!-- #####################################################  -->
            <div class="col"></div>

            
            <div class="col-md-4 m-3 m-md-4 border border-light rounded">
                <h2>Infos publique</h2>

                <div class="d-flex flex-column flex-md-row justify-content-md-around align-items-md-center">

                    <div class="form-group">
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
                    <div class="">
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
                    <!-- .....................  -->
                </div> <!-- fin flex -->
                <!-- ================================================================ -->
            </div> <!-- fin infos publiques -->
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