<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Accueil</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="/css/corpswhite.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Nunito:400,700,800" rel="stylesheet"> 
</head>

<body>
  <div id="toppage">
    @guest <header-component></header-component>
    @else <header-component token="{{ Auth::user()->api_token }}"></header-component>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    @endguest
    <entete-component 
    titre='Bienvenue sur nomdusite !'
    sstitre = "nomdusite, un site qu'il est bien pour apprendre"
    ></entete-component>
    <navbar-component page='accueil'></navbar-component>
  </div>

  <div id="support">
    <div id="triangle3" class="tri"><svg-triangle></svg-triangle></div>
    <div id="triangle4" class="tri"><svg-triangle></svg-triangle></div>
    <div id="corps">
      <h3>
        Bienvenue,
        @guest nouvel.le arrivant.e !
        @else {{ Auth::user()->username }} !
        @endguest
      </h3>
      <p>Mettons ici un peu de lorem ipsum qui servira à raconter à quel point le site, il est beau il est bon il est gentil, et que vous devriez donner sa certif’ à la personne qui l’a fait parce que franchement le site il est trop trop bien.</p>
      <p>Vous pouvez aller <a href="/chap">lire les chapitres</a> pour réviser votre cours.</p>
      <p>Vous pouvez aussi <a href="/meth">lire les méthodes</a> pour savoir comment utiliser votre cours.</p>
      <p>Si vous pensez tout savoir, vous pouvez <a href="/exos">faire des exercices</a> pour vous muscler le cerveau.</p>
      <p>Et bien sûr, vous pouvez <a href="/register">vous inscrire</a> pour la modique somme de 499 euros par mois afin de profiter de plein d’avantages inutiles, ou bien <a href="/login">vous connecter</a> si vous êtes déjà inscrit.</p>
    </div>
  </div>

  <div id="bottompage"><footer-component></footer-component></div>
  

  <script type="text/javascript" src="js/responsive.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
</body>
</html>