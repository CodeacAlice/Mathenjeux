<template>
	<div class="note">
		<div>{{note.note}}</div>
		<button>Modifier</button>
		<button @click="deleteNote(note)">Supprimer</button>
	</div>
</template>

<script>

	export default {
		name: 'HomeNotesElement',
		props: {
			note: Object,
		},
		methods: {
			deleteNote(note) {
				this.$emit('delete-note', note);
			},
		}
	}

</script>