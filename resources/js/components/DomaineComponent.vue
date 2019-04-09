<template>
	<div>
		<div class="domaine">{{dom.name}}</div>
		<ul>
			<chapitre-component v-for="chap in chaps" :key="chap.idchapters" v-bind="chap" :chap.sync="chap"></chapitre-component>
		</ul>
	</div>
</template>

<script>
import ChapitreComponent from './ChapitreComponent.vue';
import axios from 'axios';

    export default {
    	name: 'DomaineComponent',
    	components: {
	     	ChapitreComponent,
	    },
    	props: {
	    	dom : Object, 
	    },
    	data() {
    		return {
    			chaps: [],
    		}
    	},
        mounted() {
        	console.log(this.dom.iddomaines);
            axios
            	.get('http://127.0.0.1:8000/api/domaines/'+this.dom.iddomaines+'/chapitres')
            	.then(chaps => {
            		this.chaps = chaps.data;
            	})
        }
    }
</script>