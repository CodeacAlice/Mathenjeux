<template>
	<div>
		<div v-if="chap.done">
			<a href="/chap>">
				<li class="dispo onlydesktop">
					<div>{{chap.title}}</div>
				</li>
			</a>
			<li class="dispo notdesktop">
				<div>{{chap.title}}</div>
				<a href="/chap>">
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
    	name: 'ChapitreComponent',
    	props: {
    		chap: Object
    	},
    	data() {
    		return {
    			title: 'Hello',
    		}
    	},
        mounted() {
            console.log('Chapitre almost mounted.')
        }
    }
</script>