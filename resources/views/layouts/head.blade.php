<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('images/favicon.ico') }}">

<title>{{ isset($pagetitle) ? $pagetitle : 'CNAC - CTD' }}</title>

<!-- Bootstrap 4.0-->
<link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">

<!--amcharts -->
<link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />

<!-- Bootstrap-extend -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.css') }}">

<!-- theme style -->
<link rel="stylesheet" href="{{ asset('assets/css/master_style.css') }}">

<!-- Crypto_Admin skins -->
<link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor_components/material-design-iconic-font/css/materialdesignicons.css') }}">

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

@yield('styles')