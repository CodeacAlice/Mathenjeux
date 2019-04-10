<template>
	<div id="otherChaps">
		<div id="chappr">
			
			<a class="chapnotdispo" v-if="isfirst">
				<svg-leftarrow></svg-leftarrow>
				<p class="notmobile">[Premier chapitre]</p>
			</a>
			<a href="prevlink" class="chapdispo" v-else-if="prevdone">
				<svg-leftarrow></svg-leftarrow>
				<p class="notmobile">Chapitre précédent</p>
			</a>
			<a class="chapnotdispo" v-else>
				<svg-leftarrow></svg-leftarrow>
				<p class="notmobile">Chapitre précédent<br>[bientôt disponible]</p>
			</a>
		</div>
	

		<!-- Liste des chapitres -->
		<div id="chapli">
			<a href="/chap" class="chapdispo">
				<p class="notmobile">Liste des</p> 
				<svg-chapitres></svg-chapitres>
				<p class="notmobile">chapitres</p>
			</a>
		</div>


		<div id="chapsu">
			<a class="chapnotdispo" v-if="islast"> 
				<p class="notmobile">[Dernier chapitre]</p>
				<svg-rightarrow></svg-rightarrow>
			</a>
			<a href="/chap" class="chapdispo" v-else-if="nextdone">
				<p class="notmobile">Chapitre suivant</p>
				<svg-rightarrow></svg-rightarrow>
			</a>
			<a class="chapnotdispo" v-else> 
				<p class="notmobile">Chapitre suivant<br>[bientôt disponible]</p>
				<svg-rightarrow></svg-rightarrow>
			</a>
		</div>

	</div>


</template>

<script type="text/javascript">
import SvgLeftarrow from './SvgLeftarrow.vue';
import SvgChapitres from './SvgChapitres.vue';
import SvgRightarrow from './SvgRightarrow.vue';
import axios from 'axios';

export default {
	name: 'NavChap',
	components: {
     	SvgLeftarrow,
     	SvgChapitres,
     	SvgRightarrow,
    },
	props: {
		link : String, 
	},
	data() {
		return {
			isfirst: false,
			prevdone: false,
			prevlink: '/chap',
			islast: false,
			nextdone: false,
			nextlink: '/chap',
		}
	},
	mounted() {
		axios
		.get('http://127.0.0.1:8000/api/chapitres/'+this.link+'/prev')
		.then(response => {
			var reppr = response.data;
			console.log(reppr);
			this.isfirst = (reppr == 'isfirst');
			this.prevdone = (reppr !== 'isfirst' && reppr !== 'notdone');
			this.prevlink = reppr;
		})

		axios
		.get('http://127.0.0.1:8000/api/chapitres/'+this.link+'/next')
		.then(response => {
			var repnext = response.data;
			console.log(repnext);
			this.islast = (repnext == 'islast');
			this.nextdone = (repnext !== 'islast' && repnext !== 'notdone');
			this.nextlink = repnext;
		})
	}
}
</script>