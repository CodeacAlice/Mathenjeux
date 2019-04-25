<template>
	<header v-bind:class="{ connected: token }">
		<div v-if="token">+</div>
		<a href="/" class="titre">Nom du site</a>
		<div v-if="token" style="height:100%;">
			<div class="dropdown" style="height:100%;">
				<button onclick="burgerMenu()" class="dropbtn makeitdrop">Bonjour Toto <svg-user></svg-user></button>
				<div id="myDropdown" class="dropdown-content">
			        <a href="/home">Mon compte</a>
			        <a href="/logout">Déconnexion</a>
			    </div>
			</div>
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
import SvgUser from './SvgUser.vue';
import axios from 'axios';

export default {
	name: 'HeaderComponent',
	components: {
		SvgAccueil,
		SvgChapitres,
		SvgMethodes,
		SvgExercices,
		SvgMenuthin,
		SvgUser,
	},
	props: {
    	token : String, 
    },
	mounted() {
		sizesup();
	},
	methods: {
		send() {
			axios
				.get('http://127.0.0.1:8000/api/users/show?api_token='+this.token)
				.then(response => {
					this.test = 'hello';
					console.log(response.data);
				})
		}
	},
	data() {
		return {
			test: 'coucou'
		}
	}
}
</script>

<style scoped>
header {
	width: 100%;
	background: #C4C4C4;
	box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.5);
	position:fixed;
	top: 0;
	z-index: 2;
}

header .titre {
	text-align: center;
	margin: auto;
}

header a {
	color: black;
}

	/* Mobile */
@media screen and (max-width: 767px) {
	header {
		display: flex;
	}
	header .titre {
		font-size: 22px;
	}

	.dropbtn svg {
		width: 25px;
		height: 25px;
	}

	.dropbtn {
	  background-color: #E5E5E5;
	  color: white;
	  padding: 0;
	  font-size: 16px;
	  border: none;
	  cursor: pointer;
	  width: 50px;
	  height: 40px;
	}

	.dropbtn:hover, .dropbtn:focus {
	  background-color: ##f1f1f1;
	}

	.dropdown {
	  float: right;
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f1f1f1;
	  min-width: 160px;
	  overflow: auto;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  right: 0;
	  z-index: 2;
	  text-align: center
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  border: 1px solid black;
	  display: flex;
	  justify-content: space-around;
	}

	.dropdown a:hover {background-color: #ddd;}

	.dropdown-content svg {
		width: 22px;
		height: 22px;
	}

	.show {display: block;}
}
	/* Tablet */
@media screen and (min-width: 768px) and (max-width: 1279px) {
	header {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
	}
	header .titre {
		font-size: 30px;
		grid-column: 2;
	}
	header div {
		grid-column: 3;
		display: flex;
		margin: auto;
		margin-right: 30px;
	}

	.conn {
		background: #E5E5E5;
		box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 15px;
		padding: 3px;
		margin-left: 15px;
		padding-left: 15px;
		padding-right: 15px;
	}
}
	/* Desktop */
@media screen and (min-width: 1280px) {
	header {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
	}
	.connected {display: flex;}

	header .titre {
		font-size: 30px;
		grid-column: 2;
	}
	header div {
		grid-column: 3;
		display: flex;
		margin: auto;
		margin-right: 30px;
	}
	.connected div {float: right; margin-right:0;}

	.conn {
		background: #E5E5E5;
		box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
		border-radius: 15px;
		padding: 3px;
		margin-left: 15px;
		padding-left: 15px;
		padding-right: 15px;
	}

	.dropbtn svg {
		width: 40px;
		height: 40px;
	}

	.dropbtn {
	  background-color: #E5E5E5;
	  color: black;
	  padding: 0 15px;
	  border: none;
	  cursor: pointer;
	}

	.dropbtn:hover, .dropbtn:focus {
	  background-color: ##f1f1f1;
	}

	.dropdown {
	  float: right;
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f1f1f1;
	  min-width: 160px;
	  overflow: auto;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  right: 0;
	  z-index: 2;
	  text-align: center
	}

	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  border: 1px solid black;
	  display: flex;
	  justify-content: space-around;
	}

	.dropdown a:hover {background-color: #ddd;}

	.dropdown-content svg {
		width: 22px;
		height: 22px;
	}

	.show {display: block;}
}

</style>