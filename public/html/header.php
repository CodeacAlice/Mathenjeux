<header>
	<a href="<?=$level?>index.php" class="titre">Nom du site</a>
	<div class="notmobile">
		<a href="<?=$level?>pages/login/inscription.php" class="conn">Inscription</a>
		<a href="<?=$level?>pages/login/connexion.php" class="conn">Connexion</a>
	</div>
	<div class="onlymobile dropdown">
	    <button onclick="myFunction()" class="dropbtn makeitdrop"><?php echo file_get_contents("icons/opt-menuthin.svg"); ?></button>
	    <div id="myDropdown" class="dropdown-content">
	        <a href="<?=$level?>index.php"><?php echo file_get_contents("icons/accueil.svg"); ?> Accueil</a>
	        <a href="<?=$level?>pages/listechap.php"><?php echo file_get_contents("icons/chapitres.svg"); ?> Chapitres</a>
	        <a href="<?=$level?>pages/listemeth.php"><?php echo file_get_contents("icons/methodes.svg"); ?> Méthodes</a>
	        <a href="<?=$level?>pages/listeexos.php"><?php echo file_get_contents("icons/exercices.svg"); ?> Exercices</a>
	        <a href="<?=$level?>pages/login/inscription.php">Inscription</a>
	        <a href="<?=$level?>pages/login/connexion.php">Connexion</a>
	    </div>
    </div> 
</header>