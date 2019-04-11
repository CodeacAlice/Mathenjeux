<template>
	<header>
		<a href="/" class="titre">Nom du site</a>
		<div class="notmobile">
			<a href="<?=$level?>pages/login/inscription.php" class="conn">Inscription</a>
			<a href="<?=$level?>pages/login/connexion.php" class="conn">Connexion</a>
		</div>
		<div class="onlymobile dropdown">
		    <button onclick="burgerMenu()" class="dropbtn makeitdrop"><svg-menuthin></svg-menuthin></button>
		    <div id="myDropdown" class="dropdown-content">
		        <a href="/"><svg-accueil></svg-accueil> Accueil</a>
		        <a href="/chap"><svg-chapitres></svg-chapitres> Chapitres</a>
		        <a href="/meth"><svg-methodes></svg-methodes> Méthodes</a>
		        <a href="/exos"><svg-exercices></svg-exercices> Exercices</a>
		        <a href="<?=$level?>pages/login/inscription.php">Inscription</a>
		        <a href="<?=$level?>pages/login/connexion.php">Connexion</a>
		    </div>
	    </div> 
	</header>
</template>

<script>
import SvgAccueil from './SvgAccueil.vue';
import SvgChapitres from './SvgChapitres.vue';
import SvgMethodes from './SvgMethodes.vue';
import SvgExercices from './SvgExercices.vue';
import SvgMenuthin from './SvgMenuthin.vue';

export default {
	name: 'HeaderComponent',
	components: {
		SvgAccueil,
		SvgChapitres,
		SvgMethodes,
		SvgExercices,
		SvgMenuthin,
	}
}
</script>