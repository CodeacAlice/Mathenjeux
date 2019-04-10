<template>
	<div id="chappr">
		
		<a class="chapnotdispo" v-if="isfirst">
			<p class="notmobile">[Premier chapitre]</p>
		</a>
		<a href="linkprev" class="chapdispo" v-else-if="done">
			<p class="notmobile">Chapitre précédent</p>
		</a>
		<a class="chapnotdispo" v-else>
			<p class="notmobile">Chapitre précédent<br>[bientôt disponible]</p>
		</a>
</div>
</template>

<script type="text/javascript">
	import axios from 'axios';

	export default {
		name: 'ChapnavPrec',
		props: {
	    	link : String, 
	    },
    	data() {
    		return {
    			isfirst: false,
    			done: false,
    			linkprev: '/chap',
    		}
    	},
        mounted() {
            axios
        	.get('http://127.0.0.1:8000/api/chapitres/'+this.link+'/prev')
        	.then(response => {
        		console.log(response);
            })
        }
    }
</script>