<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Exercices</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="/css/corpswhite.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Varela+Round&display=swap" rel="stylesheet"> 
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
    sstitre = "Entraînez-vous ici avec les exercices"
    ></entete-component>
    <navbar-component page='exos'></navbar-component>
  </div>

  <div id="support">
    <div id="triangle3" class="tri"><svg-triangle></svg-triangle></div>
    <div id="triangle4" class="tri"><svg-triangle></svg-triangle></div>
      <div id="corps">
          <p>Il n'y a pas encore d'exercice pour l'instant, un peu de patience ;)</p>
      </div>
  </div>

  <div id="bottompage"><footer-component></footer-component></div>
    

    <script type="text/javascript" src="js/responsive.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>