<template>
	<div id="corps">
		<h4 v-show="notes.length > 0">Notes :</h4>
		<home-notes-element 
			v-for="note in notes" 
			:key="note.id" 
			v-bind="note" 
			:note.sync="note" 
			v-on:delete-note="deleteNote" 
			v-bind:token="token">
		</home-notes-element>

		<textarea name="newnote" cols="40" rows="5" maxlength="255" v-model="newnote" v-on:keyup.enter="addnewnote"></textarea> <button v-on:click="addnewnote">Ajouter</button>
	</div>
</template>

<script>
import HomeNotesElement from './HomeNotesElement.vue';
import axios from 'axios';


	export default {
		name: 'HomeNotes',
		components: {
	    	HomeNotesElement,
	    },
		props: {
	    	token : String, 
	    },
	    data() {
	    	return {
	    		notes: [],
	    		newnote: '',
	    	}
	    },
		mounted() {
			sizesup();
			axios
				.get('http://127.0.0.1:8000/api/notes?api_token='+this.token)
				.then(response => {
					this.notes = response.data
				})
		},
		methods: {
			addnewnote() {
				if (this.newnote !== '') {
					var sendingnote = this.newnote.replace( /&/g, '%26').replace( /\+/g, '%2B').replace( /#/g, '%23');
					axios
						.post('http://127.0.0.1:8000/api/notes/add?api_token='+this.token+'&note='+sendingnote)
						.then(response => {
							this.notes.push({id: response.data, note: this.newnote})
							this.newnote = '';
						})
				}
			},
			deleteNote(note) {
		        var id = note['id'];
		        axios
		        	.delete(`http://127.0.0.1:8000/api/notes/` + id + `/suppr?api_token=`+this.token)
		        	.then(response => {
		        		var index = this.notes.indexOf(note);
		        		this.notes.splice(index, 1);
		        	})
		    }
		}
	}

</script>

<style scoped>

.note {
	border: 1px solid #542f08;
	padding: 10px;
	word-break: break-all;
}

textarea {
	margin-top: 20px;
}

</style>