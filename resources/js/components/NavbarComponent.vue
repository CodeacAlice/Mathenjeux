<template>
	<nav>
		
		<a class="notactive" v-if="page == 'accueil'">
			<div class="navig"><svg-accueil></svg-accueil></div>
			<p class="notmobile">Accueil</p>
		</a>
		<a href="/" class="actif" v-else>
			<div class="navig"><svg-accueil></svg-accueil></div>
			<p class="notmobile">Accueil</p>
		</a>

		
		<a class="notactive" v-if="page == 'chapitres'">
			<div class="navig"><svg-chapitres></svg-chapitres></div>
			<p class="notmobile">Chapitres</p>
		</a>
		<a href="/chap" class="actif" v-else> 
			<div class="navig"><svg-chapitres></svg-chapitres></div>
			<p class="notmobile">Chapitres</p>
		</a>

		
		<a class="notactive" v-if="page == 'methodes'"> 
			<div class="navig"><svg-methodes></svg-methodes></div>
			<p class="notmobile">Méthodes</p>
		</a>
		<a href="/meth" class="actif" v-else>
			<div class="navig"><svg-methodes></svg-methodes></div>
			<p class="notmobile">Méthodes</p>
		</a>

		
		<a class="notactive" v-if="page == 'exercices'">
			<div class="navig"><svg-exercices></svg-exercices></div>
			<p class="notmobile">Exercices</p>
		</a>
		<a href="/exos" class="actif" v-else> 
			<div class="navig"><svg-exercices></svg-exercices></div>
			<p class="notmobile">Exercices</p>
		</a>
	</nav>
</template>

<script>
export default {
	name: 'SvgNom',
	props: {
		page: String
	}
}
</script>