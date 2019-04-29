<template>
	<div class="note">
		<div>{{note.note}}</div>
		<button>Edit</button>
		<button>Suppr</button>
	</div>
</template>

<script>

	export default {
		name: 'HomeNotesElement',
		props: {
			note: Object,
		}
	}

</script>