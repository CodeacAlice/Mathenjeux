<template>
	<div>
		<button
		    v-for="tab in tabs"
		    v-bind:key="tab"
		    v-bind:class="['tab-button', { active: currentTab === tab }]"
		    v-on:click="currentTab = tab"
		  >{{ tab }}
		</button>

		<component
		    v-bind:is="currentTabComponent"
		    class="tab"
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