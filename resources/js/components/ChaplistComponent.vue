<template>
	<div>
		<domaine-component v-for="dom in doms" :key="dom.iddomaines" v-bind="dom" :dom.sync="dom">
		</domaine-component>
	</div>
</template>

<script type="text/javascript">
	import DomaineComponent from './DomaineComponent.vue';
	import axios from 'axios';

	export default {
		name: 'ChaplistComponent',
		components: {
	    	DomaineComponent,
	    },
    	data() {
    		return {
    			doms: [
    				{
    					iddomaines: 1, 
    					name: 'coucou',
    					chaps: [
    					{
    						idchapters: 1,
    						title: 'premier chapitre',
    						done: 0
    					},
    					{
    						idchapters: 2,
    						title: 'deuxième chapitre',
    						done: 1
    					}
    					]
    				},
    				{
    					iddomaines: 2, 
    					name: 'c\'est moi',
    					chaps: [
    					{
    						idchapters: 3,
    						title: 'on ne dit pas second quand il y a plus de deux',
    						done: 0
    					},
    					{
    						idchapters: 4,
    						title: 'pour ça qu\'on parle de seconde guerre mondiale',
    						done: 1
    					},
    					{
    						idchapters: 5,
    						title: 'parce qu\'on espère qu\'il n\'y en aura pas troisième',
    						done: 1
    					}
    					]
    				}
    			],
    		}
    	},
        mounted() {
            console.log('Chaplist kinda mounted?');
            axios
        	.get('http://127.0.0.1:8000/api/domaines/')
        	.then(domaines => {
        		//console.log(domaines);
        		this.doms = domaines.data;
    //     		this.doms.forEach(function(adom) {
				// 	console.log(adom);
				// 	var index = adom.iddomaines;
    //     			axios
    // 				.get('http://127.0.0.1:8000/api/domaines/'+index+'/chapitres/')
    // 				.then (chapitres => {
    // 					adom['chaps'] = chapitres.data;
    // 				})
				// });
        		console.log(this.doms);
            	})
        }
    }
</script>