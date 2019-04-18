<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Intégration inscription</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="/css/corpswhite.css">
  <link rel="stylesheet" type="text/css" href="/css/register.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Nunito:400,700,800" rel="stylesheet"> 
</head>

<body>
  <div id="toppage">
    <header-component></header-component>
    <entete-component 
    titre='Bienvenue sur nomdusite !'
    sstitre = "Souhaitez-vous vous inscrire ?"
    ></entete-component>
    <navbar-component page='register'></navbar-component>
  </div>
    

  <div id="support">
    <div id="triangle3" class="tri"><svg-triangle></svg-triangle></div>
    <div id="triangle4" class="tri"><svg-triangle></svg-triangle></div>
    
    <div id="corps">

      <h3>Inscription</h3>

      <p>Vous avez déjà un compte ? <a href="/">Cliquez ici pour vous connecter</a>.</p>
      <p>Pourquoi s’inscrire ? Parce que c’est gratuit, garanti sans spam, et que vous pourrez sauvegarder votre progression ainsi que vos meilleurs scores.</p>
      <p>Pour cela il vous suffit de remplir le formulaire ci-dessous puis de valider votre adresse mail :</p>
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div id="formContent">
          <div class="formlabel"><label for="username">{{ __('Pseudo :') }}</label></div>

          <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

            @if ($errors->has('username'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
            @endif
          </div>
        
          <div class="formlabel"><label for="email">{{ __('Adresse mail :') }}</label></div>

          <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
        

        
          <div class="formlabel"><label for="password">{{ __('Mot de passe :') }}</label></div>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
        

        
            <div class="formlabel"><label for="password-confirm">{{ __('Confirmer le mot de passe :') }}</label></div>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>
        

          <div class="btnContainer">
              <button type="submit" id="btnRegister">
                  {{ __('Inscription') }}
              </button>
          </div>
      </form>


    </div>
  </div>

  <div id="bottompage"><footer-component></footer-component></div>
  

  <script type="text/javascript" src="js/responsive.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
</body>
</html>
