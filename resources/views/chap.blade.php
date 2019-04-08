<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Chapitres</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/stylesheet.css') }}">
  <link rel="stylesheet" type="text/css" href="/css/chaplist.css">

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
        $sstitre = 'Retrouvez ici la liste des chapitres du programme';
        include('html/entete.php'); 
    ?>

    <?php 
        $page = 'chap';
        include('html/nav.php'); 
    ?>

    <div id="support">
        <div id="triangle3" class="tri"><?php echo file_get_contents("icons/triangle.svg"); ?></div>
        <div id="triangle4" class="tri"><?php echo file_get_contents("icons/triangle.svg"); ?></div>
        <div id="corps">
            [TODO] Insérer ici la liste des chapitres
        </div>
    </div>

    <?php include('html/footer.php'); ?>
    

    <script type="text/javascript" src="js/responsive.js"></script>
</body>
</html>