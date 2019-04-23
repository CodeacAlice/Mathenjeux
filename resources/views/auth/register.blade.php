<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Inscription</title>

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
                    <div class="formlabel">
                        <label for="username">{{ __('Pseudo') }}<span class="red">*</span> :</label>
                    </div>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="formlabel"><label for="email">{{ __('Adresse mail') }}<span class="red">*</span> :</label></div>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>



                    <div class="formlabel"><label for="password">{{ __('Mot de passe') }}<span class="red">*</span> :</label></div>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <br><span class="smalltext">(8 caractères minimum)</span>

                        @if ($errors->has('password'))
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>



                    <div class="formlabel"><label for="password-confirm">{{ __('Confirmer le mot de passe') }}<span class="red">*</span> :</label></div>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <p>
                    Les champs marqués d’un <span class="red">*</span> sont obligatoires.
                </p>
                <p>
                    Il est fortement conseillé de mettre un mot de passe avec des caractères spéciaux mais surtout long. Genre plusieurs mots à suivre, voire une phrase (en plus c'est plus facile à retenir).
                </p>

                <div class="btnContainer">
                    <button type="submit" id="btnRegister">
                        {{ __('Inscription') }}
                    </button>
                </div>
            </form>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->




        </div>
    </div>

    <div id="bottompage"><footer-component></footer-component></div>


<script type="text/javascript" src="js/responsive.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
