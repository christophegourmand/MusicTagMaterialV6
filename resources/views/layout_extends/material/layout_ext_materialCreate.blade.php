@extends('layouts.app')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
    <style>
        div{
            /* border: 1px solid blue; */
        }
    </style>
@endsection

@section('content')

<h2 class="text-center pb-3">Création d'une annonce</h2>

<div class="container-fluid">
    <!-- <form method="POST" action="{{ url('/material/create') }}" enctype="multipart/form-data"> -->

    <form method="{{ $submitActionMethod }}" action="{{ $submitActionRoute }}" enctype="multipart/form-data">
    @csrf
    <!-- ################################################################################################# -->
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="material_category_id" class="col-form-label">{{ __('Catégorie*') }}</label>
                    <select name="material_category_id" id="material_category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach()
                    </select>
                    @if ($errors->has('material_category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('material_category_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="material_brand" class="col-form-label">{{ __('Marque *') }}</label>
                    <input id="material_brand" type="text" class="form-control" name="material_brand" value="{{$brand->name}}" required>
                    @if ($errors->has('material_brand'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('material_brand') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="material_productmodel" class="col-form-label">{{ __('Modèle/référence du matériel*') }}</label>
                    <input id="material_productmodel" type="text" class="form-control" name="material_productmodel" value="{{$material->productmodel}}" required>
                    @if ($errors->has('material_productmodel'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('material_productmodel') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="material_material_builtyear" class="col-form-label">{{ __('Date de fabrication') }}</label>
                    <input id="material_builtyear" type="date" class="form-control" name="material_builtyear" value="{{$material->builtyear}}">
                    @if ($errors->has('material_builtyear'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('material_builtyear') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="material_price" class="col-form-label">{{ __('Prix*') }}</label>
                    <input id="material_price" type="number" class="form-control" name="material_price" value="{{$material->price}}" required>
                    @if ($errors->has('material_price'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('material_price') }}</strong>
                        </span>
                    @endif
                </div>

            </div>

            <!-- ================= -->

            <div class="col-md-3">
                <label for="material_description" class="col-form-label" >Description :</label>
                <textarea id="material_description" name="material_description" rows="5" class="form-control">{{$material->description}}</textarea>
                @if ($errors->has('material_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('material_description') }}</strong>
                    </span>
                @endif
            </div>

            <!-- ================= -->

            <div class="col-md-3">
                <label for="material_photo1_description" class="col-form-label">Photo 1</label>

                <div class="form-row my-2">
                    <div class="bg-info col-3">
                        <img class="mw-100 mh-100 img-thumbnail" src="https://via.placeholder.com/400" alt="">
                    </div>
                    <div class="col-8 ml-2">
                        <input type="file" class="form-control" name="material_photo1_file" id="material_photo1_file" accept="image/*" value="{{ $photo1->file }}">
                        
                        <input type="text"  class="form-control" name="material_photo1_description" id="material_photo1_description" value="{{ $photo1->description }}" placeholder="description de l'image">
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                <label for="" class="col-form-label">Demos Audios</label>
                <div class="form-group my-2">
                    <input class="" type="file" name="" id="">
                    <input type="text" class="form-control" value="description">
                </div>
                <div class="form-group my-2">
                    <input class="" type="file" name="" id="">
                    <input type="text" class="form-control" value="description">
                </div>
                <div class="form-group my-2">
                    <input class="" type="file" name="" id="">
                    <input type="text" class="form-control" value="description">
                </div>
                <div class="my-4">
                    <label for="" class="col-form-label">Demos Youtube</label>
                    <iframe style="border:1px solid black; height:100px" id="material_video_iframe" class="mw-100"
                        src="" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                    <input id="material_video_link" type="text" class="form-control" value="">

                </div>
            </div>
            <!-- ================= -->
        </div>

        <div class="form-row justify-content-center">
            <button type="submit" class="btn btn-danger">
                {{ $submitButtonName }}
            </button>
        </div>
        
    </form>
</div>

@endsection

@section('layout_block_customJavascripts')
    @parent

    

@endsection
