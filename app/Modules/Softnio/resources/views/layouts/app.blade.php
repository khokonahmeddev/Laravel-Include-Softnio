<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/apps.css')}}">
</head>


<body class="nk-body bg-lighter npc-iapps ">
<div id="app">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <app-navbar></app-navbar>
            <!-- main header @e -->
            <!-- content @s -->
        @yield('content')
        <!-- content @e -->
            <!-- footer @s -->
        @include('App\Modules\Softnio::layouts.includes.footer')
        <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
</div>
<!-- app-root @e -->
<!-- JavaScript -->
@yield('scripts')

@auth()
    <script>
        window.user = <?php echo auth()->user()?>;
    </script>
@endauth

<script src="{{asset('js/app.js')}}"></script>
{{--<script src="{{asset('assets/js/bundle.js')}}"></script>--}}
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

</html>
