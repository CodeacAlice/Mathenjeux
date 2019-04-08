<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Méthodes</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="/css/stylesheet.css">
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
        $sstitre = 'Retrouvez ici la liste des méthodes pour réussir vos examens';
        include('html/entete.php'); 
    ?>

    <?php 
        $page = 'meth';
        include('html/nav.php'); 
    ?>

    <div id="support">
        <div id="triangle3" class="tri"><?php echo file_get_contents("icons/triangle.svg"); ?></div>
        <div id="triangle4" class="tri"><?php echo file_get_contents("icons/triangle.svg"); ?></div>
        <div id="corps">
            <p>Il n'y a pas encore de méthode pour l'instant, un peu de patience ;)</p>
        </div>
    </div>

    <?php include('html/footer.php'); ?>
    

    <script type="text/javascript" src="js/responsive.js"></script>
</body>
</html>