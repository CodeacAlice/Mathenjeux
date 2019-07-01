<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Connexion</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="/css/corpswhite.css">
  <link rel="stylesheet" type="text/css" href="/css/login.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Varela+Round&display=swap" rel="stylesheet"> 
</head>

<body>
    <div id="toppage">
        <header-component></header-component>
        @if ($errors->has('username') || $errors->has('password'))
        <div id="error">Houston, We've Got a Problem</div>
        @endif
        <entete-component 
        titre='Bienvenue sur nomdusite !'
        sstitre = "Souhaitez-vous vous connecter ?"
        ></entete-component>
        <navbar-component page='register'></navbar-component>
    </div>


    <div id="support">
        <div id="triangle3" class="tri"><svg-triangle></svg-triangle></div>
        <div id="triangle4" class="tri"><svg-triangle></svg-triangle></div>

        <div id="corps">

            <h3>Connexion</h3>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if ($errors->has('username'))
                <br>
                <div class="errormessage" role="alert" style="text-align: center;">
                    <strong>{{ $errors->first('username') }}</strong>
                </div>
                @endif
                <div id="formContent">

                    <div class="formlabel">
                        <label for="username">{{ __('Pseudo') }} :</label>
                    </div>

                    <div>
                        <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                    </div>

                    <div class="formlabel">
                        <label for="password">{{ __('Mot de passe') }} :</label>
                    </div>

                    <div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                        <br>
                        <div class="errormessage" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                        <br>
                        @endif

                        <!-- @if (Route::has('password.request'))
                        <br>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                        @endif -->
                    </div>
                </div>


                <div class="btnContainer">
                    <p>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Rester connecté.e') }}
                        </label>
                    </p>


                    <button type="submit" id="btnRegister">
                        {{ __('Connexion') }}
                    </button>
                </div>
            </form>

            <p>Pas encore de compte ? <a href="/register">Cliquez ici pour vous inscrire</a>.</p>

        </div>
    </div>

    <div id="bottompage"><footer-component></footer-component></div>


    <script type="text/javascript" src="js/responsive.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>