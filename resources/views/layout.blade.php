<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <title>@yield('layout_block_title')</title>
    
    <!-- ici les stylesheets communs à toutes les pages: -->
    @include('layout_includes.layout_incl_stylesheets')

    <!-- ici les stylesheets custom, chaque twig écrasera avec ses propres stylsheets custom -->
    @yield('layout_block_customStylesheets')

</head>

<body class="bg-brownBlack text-white">
    
    <header class="text-light">
        @include('layout_includes.layout_incl_header')

    </header>

    <div class="container-fluid">
        @yield('layout_block_body')
    </div>

    <footer>
        @include('layout_includes.layout_incl_footer')
    </footer>

    <!-- ici les scripts communs à toutes les pages: -->
    @include('layout_includes.layout_incl_scripts')

    <!-- ici les scripts custom, chaque twig écrasera avec ses propres scripts custom       -->
    @yield('block layout_block_customJavascripts')
    
</body>

</html>