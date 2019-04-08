<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Accueil</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/stylesheet.css') }}">
  <link rel="stylesheet" type="text/css" href="/css/corpswhite.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Baloo|Nunito" rel="stylesheet"> 
</head>

<body>
    <?php 
        $level = './';
        include('html/header.php'); 
    ?>

    <?php 
        $titre = 'Bienvenue sur <span class="titre">nomdusite</span> !';
        $sstitre = 'nomdusite, un site qu\'il est bien pour apprendre';
        include('html/entete.php'); 
    ?>

    <?php 
        $page = 'accueil';
        include('html/nav.php'); 
    ?>

    <div id="support">
        <div id="triangle3" class="tri"><?php echo file_get_contents("icons/triangle.svg"); ?></div>
        <div id="triangle4" class="tri"><?php echo file_get_contents("icons/triangle.svg"); ?></div>
        <div id="corps">
            <h3>Bienvenue, nouvel arrivant !</h3>
            <p>Mettons ici un peu de lorem ipsum qui servira à raconter à quel point le site, il est beau il est bon il est gentil, et que vous devriez donner sa certif’ à la personne qui l’a fait parce que franchement le site il est trop trop bien.</p>
            <p>Vous pouvez aller <a href="chap/index.php">lire les chapitres</a> pour réviser votre cours.</p>
            <p>Vous pouvez aussi <a href="meth/index.php">lire les méthodes</a> pour savoir comment utiliser votre cours.</p>
            <p>Si vous pensez tout savoir, vous pouvez <a href="exeos/index.php">faire des exercices</a> pour vous muscler le cerveau.</p>
            <p>Et bien sûr, vous pouvez <a href="login/inscription.php">vous inscrire</a> pour la modique somme de 499 euros par mois afin de profiter de plein d’avantages inutiles, ou bien <a href="login/connection.php">vous connecter</a> si vous êtes déjà inscrit.</p>
        </div>
    </div>

    <?php include('html/footer.php'); ?>
    



    
    <script type="text/javascript" src="js/responsive.js"></script>
</body>
</html>