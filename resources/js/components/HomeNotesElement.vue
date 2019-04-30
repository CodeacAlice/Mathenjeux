<template>
	<div class="note">
		<div v-show="!isediting">{{note.note}}</div>
		<button v-show="!isediting" @click="isediting = true">Modifier</button>
		<button v-show="!isediting" @click="deleteNote(note)">Supprimer</button>
		<input v-show="isediting" type="text" name="editnote" v-model="editnote">
		<button v-show="isediting" @click="editNote">Sauvegarder les modifications</button>
		<button v-show="isediting" @click="cancelEdit">Abandonner les modifications</button>
	</div>
</template>

<script>

	export default {
		name: 'HomeNotesElement',
		props: {
			note: Object,
			token: String
		},
		data() {
			return {
				isediting: false,
				editnote: this.note.note,
			}
		},
		methods: {
			deleteNote(note) {
				this.$emit('delete-note', note);
			},
			editNote() {
				if (this.editnote !== '') {
					var sendingnote = this.editnote.replace( /&/g, '%26')
					axios
						.put('http://127.0.0.1:8000/api/notes/'+this.note.id+'/update?api_token='+this.token+'&note='+sendingnote)
						.then(response => {
							this.note.note = this.editnote;
							this.isediting = false;
						})
				}
			},
			cancelEdit() {
				this.isediting = false;
				this.editnote = this.note.note;
			}
		}
	}

</script>