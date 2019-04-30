<template>
	<div id="homecomp">
		<div id="tabscontainer">
			<button
			    v-for="tab in tabs"
			    v-bind:key="tab"
			    v-bind:class="['tab-button', { active: currentTab === tab }]"
			    v-on:click="currentTab = tab"
			  >{{ tab }}
			</button>
		</div>

		<component
		    v-bind:is="currentTabComponent"
		    class="tab"
		    v-bind:token="token"
		></component>
	</div>
</template>

<script>
import HomeSummary from './HomeSummary.vue';
import HomeNotes from './HomeNotes.vue';
import axios from 'axios';

export default {
	name: 'HomeComponent',
	components: {
		HomeSummary,
		HomeNotes,
	},
	props: {
    	token : String, 
    },
	data() {
		return {
			currentTab: 'Summary',
    		tabs: ['Summary', 'Notes']
		}
	},
	computed: {
	    currentTabComponent: function () {
	    	return 'home-' + this.currentTab.toLowerCase()
		}
	}
}
</script>

<style scoped>

#homecomp {
	width: 100%;
}

#tabscontainer {
	margin: auto;
}

#corps {border-radius: 0}

	/* Mobile */
@media screen and (max-width: 767px) {
	#tabscontainer {
		width: 93%;
	}
}
	/* Tablet */
@media screen and (min-width: 768px) and (max-width: 1279px) {
	#tabscontainer {
		width: 85%;
	}
}
	/* Desktop */
@media screen and (min-width: 1280px) {
	#tabscontainer {
		width: 77%;
	}
}

.tab-button {
	background-color: rgba(255, 255, 255, 0.5);
	border: 0;
	padding: 10px;
}
.active {
	background-color: #fff;
}


</style>