<template>
	<div>
		<div v-if="chap.done">
			<a v-bind:href="link">
				<li class="dispo onlydesktop">
					<div>{{chap.title}}</div>
				</li>
			</a>
			<li class="dispo notdesktop">
				<div>{{chap.title}}</div>
				<a v-bind:href="link">
					<div class="read">Lire</div>
				</a>
			</li>
		</div>
		<li class="notdispo" v-else><div>{{chap.title}}   [bientôt disponible]</div></li>
	</div>
</template>

<script>
import axios from 'axios';

    export default {
    	name: 'ChaplistDomaineChapitre',
    	data () {
    		return {
	    		link: '/chap/' + this.chap.link
	    	}
    	},
    	props: {
    		chap: Object
    	}
    }
</script>