<template>
	<header>
		<a href="/" class="titre">Nom du site {{iduser}}</a>
		<div v-if="iduser">
			Yo
        </div>


		<div v-else>
			<div class="notmobile">
				<a href="/register" class="conn">Inscription</a>
				<a href="/login" class="conn">Connexion</a>
			</div>
			<div class="onlymobile dropdown">
			    <button onclick="burgerMenu()" class="dropbtn makeitdrop"><svg-menuthin></svg-menuthin></button>
			    <div id="myDropdown" class="dropdown-content">
			        <a href="/"><svg-accueil></svg-accueil> Accueil</a>
			        <a href="/chap"><svg-chapitres></svg-chapitres> Chapitres</a>
			        <a href="/meth"><svg-methodes></svg-methodes> Méthodes</a>
			        <a href="/exos"><svg-exercices></svg-exercices> Exercices</a>
			        <a href="/register">Inscription</a>
			        <a href="/login">Connexion</a>
			    </div>
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
	},
	props: {
    	iduser : String, 
    },
	mounted() {sizesup();}
}
</script>