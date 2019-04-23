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
  <link rel="stylesheet" type="text/css" href="/css/register.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Nunito:400,700,800" rel="stylesheet"> 
</head>

<body>
    <div id="toppage">
        <header-component></header-component>
        @if ($errors->has('username'))
        <p>Coucou</p>
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
            <p>Pas encore de compte ? <a href="/register">Cliquez ici pour vous inscrire</a>.</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div id="formContent">

                    <div class="formlabel">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }} :</label>
                    </div>

                    <div>
                        <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="formlabel">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }} :</label>
                    </div>

                    <div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Rester connecté.e') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Connexion') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div id="bottompage"><footer-component></footer-component></div>


    <script type="text/javascript" src="js/responsive.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>