<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CTD | Authentification</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="top">
      <div class="login-logo">
        <h3 class="text-dark"><b>République Algérienne Démocratique et Populaire</b></h3>
        <h3 class="text-dark"><b>Ministère du Travail, de l'Emploi et de la Sécurité Sociale</b></h3>
        <hr>
        <h4 class="text-success">Accès au Registre National automatisé d'Etat Civil</h4>
      </div>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class='login'>
            <h1 class="text-center text-light">CTD</h1>
            <div class='login_title'>
                <span>Authentification</span>
            </div>
            <div class='login_fields'>
                <div class='login_fields__user'>
                    <div class='icon'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>
                    </div>
                    <input type="text" name="user" class="form-control" value="{{ old('user') }}"
                        placeholder="Nom d'Utilisateur">
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <div class='login_fields__password'>
                    <div class='icon icon-password'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png'>
                    </div>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Mot de passe">
                    <div class='validation'>
                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png'>
                    </div>
                </div>
                <div class='login_fields__submit'>
                    <input type='submit' value='Connexion'>
                    <div class='forgot'>
                        <a href='{{ route('password.request') }}' target="_blank">Mot de passe oublie ?</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class='love'>
      <p>CTD v1.0.0 </p>
    </div>
</body>
<script src="{{ asset('assets/vendor_components/jquery/dist/jquery.min.js') }}"></script>
<script>
  $(function(){
    $('.icon-password').on('click', function(){
      var pwd = $('#password');
      if(pwd.attr('type') == 'password'){
        pwd.attr('type','text');
        return;
      }
      pwd.attr('type','password');
    });
  });
</script>
@error('user')
    <script>
        alert("{{ $message }}" + ' ou votre compte est desactiver');
    </script>
@enderror

@error('password')
    <script>
        alert("{{ $message }}");
    </script>
@enderror
</html>
