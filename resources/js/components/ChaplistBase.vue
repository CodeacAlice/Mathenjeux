<template>
	<div>
		<chaplist-domaine v-for="dom in doms" :key="dom.iddomaines" v-bind="dom" :dom.sync="dom">
		</chaplist-domaine>
	</div>
</template>

<script type="text/javascript">
	import ChaplistDomaine from './ChaplistDomaine.vue';
	import axios from 'axios';

	export default {
		name: 'ChaplistBase',
		components: {
	    	ChaplistDomaine,
	    },
    	data() {
    		return {
    			doms: [],
    		}
    	},
        mounted() {
            axios
        	.get('http://127.0.0.1:8000/api/domaines/')
        	.then(domaines => {
        		this.doms = domaines.data;
            	})
        }
    }
</script>