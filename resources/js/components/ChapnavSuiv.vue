<template>
	<div id="chappr">
		
		<a href="<?= $pr['link'] ?>" class="chapdispo">
			<p class="notmobile">Chapitre précédent</p>
		</a>
		
		<a class="chapnotdispo">
			<p class="notmobile">Chapitre précédent<br>[bientôt disponible]</p>
		</a>
	<a class="chapnotdispo">
		<p class="notmobile">[Premier chapitre]</p>
	</a>
</div>
</template>

<script type="text/javascript">
	import axios from 'axios';

	export default {
		name: 'ChapNavig',
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