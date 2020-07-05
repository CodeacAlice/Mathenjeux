<template>
	<header>
    <div v-if="token" class="token">
      <button id="btnNote" class="dropbtn makeitdrop" onclick="burgerMenu(3)">+ 
        <span class="notmobile makeitdrop">Note</span></button>
      <div id="myDropdown3" class="dropdown-content totheleft makeitdrop">
        Ajouter une note :
        <textarea name="Text1" cols="40" rows="5" maxlength="255" class="makeitdrop" v-model="note" v-on:input="message = ''" v-on:keyup.enter="addnote"></textarea>
        <button id="addanote" class="makeitdrop" v-on:click="addnote">Ajouter</button>
        <br v-if="message">{{message}}
      </div>
    </div>

    <a href="/" class="titre">Mathenjeux</a>

    <div v-if="token" class="token">
      <div class="dropdown" style="height:100%;">
        <button id="menuConn" onclick="burgerMenu(1)" class="dropbtn makeitdrop">
          <span class="notmobile makeitdrop">Padawan {{username}}&nbsp;&nbsp;&nbsp; </span>
          <svg-user></svg-user>
        </button>
        <div id="myDropdown1" class="dropdown-content totheright">
          <a class="onlymobile anotactive">Padawan {{username}}</a>
          <a href="/home">Mon compte</a>
          <a href="/"><svg-accueil></svg-accueil> Accueil</a>
          <a href="/chap"><svg-chapitres></svg-chapitres> Chapitres</a>
          <a href="/meth"><svg-methodes></svg-methodes> Méthodes</a>
          <a href="/exos"><svg-exercices></svg-exercices> Exercices</a>
          <a href="/logout"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            <svg-logout></svg-logout> Déconnexion</a>
        </div>
      </div>
    </div>


    <div v-else class="nottoken">
      <div class="notmobile" id="connContainer">
        <a href="/register" class="conn">Inscription</a>
        <a href="/login" class="conn">Connexion</a>
      </div>
      <div class="onlymobile dropdown">
        <button onclick="burgerMenu(2)" class="dropbtn makeitdrop"><svg-menuthin></svg-menuthin></button>
        <div id="myDropdown2" class="dropdown-content totheright">
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
import SvgLogout from './SvgLogout.vue';
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
		SvgLogout,
	},
	props: {
    	token : String, 
    },
	data() {
		return {
			username: '',
			note: '',
			message: '',
		}
	},
	mounted() {
		sizesup();
		if (this.token) {
			axios
				.get('http://127.0.0.1:8000/api/users/show?api_token='+this.token)
				.then(response => {
					this.username = response.data.username;
				})
		}

	},
	methods: {
		addnote() {
			if (this.note !== '') {
				var sendingnote = this.note.replace( /&/g, '%26').replace( /\+/g, '%2B').replace( /#/g, '%23');
				axios
					.post('http://127.0.0.1:8000/api/notes/add?api_token='+this.token+'&note='+sendingnote)
					.then(response => {
						this.note = '';
						this.message = 'La note a bien été ajoutée.';
					})
			}
		}
	}
}
</script>

<style scoped>
svg {fill: #542f08;}

header {
	width: 100%;
	background: #ed9940;
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
	color: #542f08;
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
	  height: 40px;
	}

	.dropdown-content {min-width: 160px;}

	.dropdown-content svg {
		width: 22px;
		height: 22px;
	}
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

	header button {
		height: 48px; 
		color: black;
		font-size: 16px;
	}

	.nottoken {
		margin: auto;
		margin-right: 20px;
	}

	.dropbtn svg {
		width: 30px;
		height: 30px;
	}

	.dropdown-content {min-width: 180px;}

	.dropdown-content svg {
		width: 20px;
		height: 20px;
	}
}
	/* Desktop */
@media screen and (min-width: 1280px) {
	header {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
	}

	header button {
		height: 48px; 
		color: black;
		font-size: 18px;
	}

	.nottoken {
		margin: auto;
		margin-right: 30px;
	}

	header .titre {
		font-size: 30px;
		grid-column: 2;
	}
	#connContainer {
		grid-column: 3;
		display: flex;
		margin: auto;
		margin-right: 30px;
	}

	.dropbtn svg {
		width: 40px;
		height: 40px;
	}

	.dropdown-content svg {
		width: 30px;
		height: 30px;
	}

	.dropdown-content {min-width: 200px;}
}

#connContainer {
	display: flex;
}

.conn {
	background: #fad39e;
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
	border-radius: 15px;
	padding: 3px;
	margin-left: 15px;
	padding-left: 15px;
	padding-right: 15px;
}

#menuConn {
	display: flex;
	justify-content: space-between;
	align-items: center;
	word-wrap: anywhere;
}

.dropbtn {
  background-color: #f9cc90;
  color: #542f08;
  padding: 0 15px;
  border: none;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #f9cc90;
}

.dropdown {
  float: right;
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fad39e;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 2;
}
.totheleft {left: 0; padding: 20px; width: min-content;}
.totheright {right: 0; text-align: center}

.dropdown-content a {
  color: #542f08;
  padding: 12px 16px;
  border: 1px solid #542f08;
  display: flex;
  justify-content: space-around;
  align-items: center;
  word-wrap: anywhere;
}
.dropdown .anotactive {color: rgba(84, 47, 8, 0.5);}
.dropdown a:hover {background-color: #edca9c;}
.dropdown .anotactive:hover {text-decoration: none; background-color: #fad39e;}

.show {display: block;}

#addanote {
	height: auto;
	background: #FFFFFF;
	border: 1px solid #542f08;
	color: #542f08;
	box-sizing: border-box;
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	border-radius: 15px;
	padding: 5px 15px;
	margin-top: 10px;
}

</style>