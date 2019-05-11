<template>
	<div class="note">
		<div v-show="!isediting">
			{{note.note}}<br>
			<button @click="startEditing">Modifier</button>
			<button @click="deleteNote(note)">Supprimer</button>
		</div>
		<div v-show="isediting">
			<input type="text" name="editnote" v-model="editnote"><br>
			<button @click="editNote">Sauvegarder les modifications</button>
			<button @click="cancelEdit">Abandonner les modifications</button>
		</div>
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
			startEditing () {
				this.editnote = this.note.note;
				this.isediting = true; 
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