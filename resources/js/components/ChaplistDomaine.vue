<template>
	<div>
		<div class="domaine">{{dom.name}}</div>
		<ul>
			<chaplist-domaine-chapitre v-for="chap in chaps" :key="chap.idchapters" v-bind="chap" :chap.sync="chap"></chaplist-domaine-chapitre>
		</ul>
	</div>
</template>

<script>
import ChaplistDomaineChapitre from './ChaplistDomaineChapitre.vue';
import axios from 'axios';

    export default {
    	name: 'ChaplistDomaine',
    	components: {
	     	ChaplistDomaineChapitre,
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
            axios
            	.get('http://127.0.0.1:8000/api/domaines/'+this.dom.iddomaines+'/chapitres')
            	.then(chaps => {
            		this.chaps = chaps.data;
            	})
        }
    }
</script>