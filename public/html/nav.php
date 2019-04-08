<nav>
	<?php if ($page == 'accueil') { ?>
	<a class="notactive"> <?php } else { ?>	
	<a href="<?=$level?>index.php" class="actif"> <?php } ?>
		<div class="navig"><?php echo file_get_contents("icons/accueil.svg"); ?></div>
		<p class="notmobile">Accueil</p>
	</a>

	<?php if ($page == 'chap') { ?>
	<a class="notactive"> <?php } else { ?>	
	<a href="<?=$level?>pages/listechap.php" class="actif"> <?php } ?>
		<div class="navig"><?php echo file_get_contents("icons/chapitres.svg"); ?></div>
		<p class="notmobile">Chapitres</p>
	</a>

	<?php if ($page == 'meth') { ?>
	<a class="notactive"> <?php } else { ?>	
	<a href="<?=$level?>pages/listemeth.php" class="actif"> <?php } ?>
		<div class="navig"><?php echo file_get_contents("icons/methodes.svg"); ?></div>
		<p class="notmobile">Méthodes</p>
	</a>

	<?php if ($page == 'exos') { ?>
	<a class="notactive"> <?php } else { ?>	
	<a href="<?=$level?>pages/listeexos.php" class="actif"> <?php } ?>
		<div class="navig"><?php echo file_get_contents("icons/exercices.svg"); ?></div>
		<p class="notmobile">Exercices</p>
	</a>
</nav>