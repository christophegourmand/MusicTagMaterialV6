@extends('layout')

@section('layout_block_title')
    {{ $title }}
@endsection

@section('layout_block_customStylesheets')
    @parent
@endsection

@section('layout_block_body')

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $title }}</h1>

        </div>
    </div>

@endsection

@section('layout_block_customJavascripts')
@endsection
