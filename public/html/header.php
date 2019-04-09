<header>
	<a href="/" class="titre">Nom du site</a>
	<div class="notmobile">
		<a href="<?=$level?>pages/login/inscription.php" class="conn">Inscription</a>
		<a href="<?=$level?>pages/login/connexion.php" class="conn">Connexion</a>
	</div>
	<div class="onlymobile dropdown">
	    <button onclick="myFunction()" class="dropbtn makeitdrop"><?php echo file_get_contents("icons/opt-menuthin.svg"); ?></button>
	    <div id="myDropdown" class="dropdown-content">
	        <a href="/"><?php echo file_get_contents("icons/accueil.svg"); ?> Accueil</a>
	        <a href="/chap"><?php echo file_get_contents("icons/chapitres.svg"); ?> Chapitres</a>
	        <a href="/meth"><?php echo file_get_contents("icons/methodes.svg"); ?> Méthodes</a>
	        <a href="/exos"><?php echo file_get_contents("icons/exercices.svg"); ?> Exercices</a>
	        <a href="<?=$level?>pages/login/inscription.php">Inscription</a>
	        <a href="<?=$level?>pages/login/connexion.php">Connexion</a>
	    </div>
    </div> 
</header>