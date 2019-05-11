<template>
	<div id="corps">
		<h3>Bienvenue, {{username}} !</h3>
		<p>Vous avez pour l'instant {{points}} points, ce qui fait de vous un.e Padawan de niveau 1.</p>
	</div>
</template>

<script>
	export default {
		name: 'HomeSummary',
		props: {
			token : String, 
		},
		data() {
			return {
				username: '',
				points: 0,
			}
		},
		mounted() {
			sizesup();
			axios
				.get('http://127.0.0.1:8000/api/users/show?api_token='+this.token)
				.then(response => {
					this.username = response.data.username;
					this.points = response.data.points
				})
		},
	}

</script>