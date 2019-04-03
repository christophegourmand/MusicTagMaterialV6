@extends('layout')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
@endsection


@section('block layout_block_body')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $title }}</h1>
            <p class="lead">Site en préparation...</p>
        </div>
    </div>

@endsection

@section('block layout_block_customJavascripts')
@endsection
