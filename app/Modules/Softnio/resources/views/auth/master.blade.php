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

<body class="nk-body npc-iapps pg-auth">
<div id="app">
<div class="nk-app-root">
    <!-- wrap @s -->
    <div class="nk-wrap ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
            <div class="brand-logo pb-4 text-center">
                <a href="index.html" class="logo-link">
                    <img class="logo-light logo-img logo-img-lg" src="{{asset('assets/images/logo.png')}}"
                         srcset="images/logo2x.png 2x"
                         alt="logo">
                    <img class="logo-dark logo-img logo-img-lg" src="{{asset('assets/images/logo-dark.png')}}"
                         srcset="{{asset('assets/images/logo-dark2x.png 2x')}}" alt="logo-dark">
                </a>
            </div>
            @yield('content')
        </div>
        <div class="nk-footer nk-auth-footer-full">
            <div class="container wide-lg">
                <div class="row g-3">
                    <div class="col-lg-6 order-lg-last">
                        <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Terms & Condition</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="nk-block-content text-center text-lg-left">
                            <p class="text-soft">&copy; 2020 DashLite. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wrap @e -->
</div>
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('assets/js/bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

</html>
