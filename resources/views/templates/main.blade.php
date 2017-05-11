<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.png') }}" type="image/png">
    <!-- fonts intialize-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap, fancybox and animate -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('fancybox/jquery.fancybox.css') }}" type="text/css" media="screen" />
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Material Design -->
    <link href="{{ URL::asset('css/material-design.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/ripples.min.css') }}" rel="stylesheet">


    <link href="{{ URL::asset('css/snackbar.min.css') }}" rel="stylesheet">

    <!-- Custome Styles -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
@yield('content')
<footer>
    <div class="container">
        <div class="footer_bottom"><span>Copyright © 2017, Developed by <a href="http://www.hasotech.com">Team Hasoian</a> to <b>Save The Hacker</b>. </span> </div>
    </div>
</footer>
<script src="{{ URL::asset('js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

<script src="{{ URL::asset('js/ripples.min.js') }}"></script>
<script src="{{ URL::asset('js/material.min.js') }}"></script>
<script src="{{ URL::asset('js/snackbar.min.js') }}"></script>

<!-- Script Files -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-scrolltofixed.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.nav.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.isotope.js') }}"></script>
<script src="{{ URL::asset('fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/sweetalert.min.js') }}"></script>

<!-- Contact JS-->
<script src="{{ URL::asset('contact/jqBootstrapValidation.js') }}"></script>
<script src="{{ URL::asset('contact/contact_me.js') }}"></script>

<script>
    $(function () {
        $.material.init();
    });
</script>
</body>
</html>