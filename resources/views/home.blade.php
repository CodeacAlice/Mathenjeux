<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Mon compte</title>

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
    <header-component token="{{ Auth::user()->api_token }}"></header-component>
  </div>

  <div id="support">
    <div id="triangle3" class="tri"><svg-triangle></svg-triangle></div>
    <div id="triangle4" class="tri"><svg-triangle></svg-triangle></div>
    <div id="corps">
      <h3>Bienvenue, {{ Auth::user()->username }} !</h3>
      @guest
      <div>Salut je suis un.e guest</div>
      @else
      <div>Salut je suis connecté.e</div>
      @endguest


      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    </div>
  </div>

  <div id="bottompage"><footer-component></footer-component></div>
  

  <script type="text/javascript" src="js/responsive.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
</body>
</html>