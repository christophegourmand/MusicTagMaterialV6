<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('layout_block_title')</title>

    <!-- ici les stylesheets communs à toutes les pages: -->
    @include('layout_includes.layout_incl_stylesheets')

    <!-- ici les stylesheets custom, chaque twig écrasera avec ses propres stylsheets custom -->
    @yield('layout_block_customStylesheets')

</head>
<body class="bg-brownBlack text-white">
    <div id="app">

        <header class="text-light">
            @include('layout_includes.layout_incl_header')
        </header>        

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            @include('layout_includes.layout_incl_footer')
        </footer>

        <!-- ici les scripts communs à toutes les pages: -->
        @include('layout_includes.layout_incl_scripts')

        <!-- ici les scripts custom, chaque twig écrasera avec ses propres scripts custom       -->
        @yield('block layout_block_customJavascripts')

    </div> <!-- fin de div id='app' -->
</body>
</html>
