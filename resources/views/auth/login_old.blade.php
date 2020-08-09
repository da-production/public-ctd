<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>CTD </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ asset('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.css') }}">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/css/master_style.css') }}">

	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.css') }}">	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h5 class="text-dark"><b>République Algérienne Démocratique et Populaire</b></h5>
    <h5 class="text-dark"><b>Ministère du Travail, de l'Emploi et de la Sécurité Sociale</b></h5>
    <hr>
    <h6 class="text-success">Accès au Registre National automatisé d'Etat Civil</h6>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Authentification</b></p>

    <form action="{{ route('login') }}" method="POST" class="form-element">
        @csrf
      
      @error('user')
        <span class="invalid-feedback" style="display: block" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" value="{{ old('user') }}" placeholder="Nom d'Utilisateur">
        <span class="ion ion-user form-control-feedback"></span>
      </div>
      @error('password')
          <span class="invalid-feedback" style="display: block" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password"  class="form-control" placeholder="Mot de passe">
        <span class="ion ion-locked form-control-feedback" style="cursor: pointer"></span>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="checkbox">
            <input type="checkbox" id="basic_checkbox_1" name="remember" {{ old('remember') ? 'checked' : '' }}>
			      <label for="basic_checkbox_1">Rester connectez</label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-6">
         <div class="fog-pwd">
          	<a href="javascript:void(0)"><i class="ion ion-locked"></i> Mot de passe oublie</a><br>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10">Connexion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


	<!-- jQuery 3 -->
	<script src="{{ asset('assets/vendor_components/jquery/dist/jquery.min.js') }}"></script>
	
	<!-- popper -->
	<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <script>
    $(function(){
      $('.ion-locked').on('click', function(){
        var pwd = $('#password');
        if(pwd.attr('type') == 'password'){
          pwd.attr('type','text');
          return;
        }
        pwd.attr('type','password');
      });
    });
  </script>

</body>
</html>