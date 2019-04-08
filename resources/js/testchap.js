const corps = new Vue ({
	el: '#corps',
	data: {
		chap: [],
	},
	mounted() {
		axios
			.get('http://127.0.0.1:8000/api/chapitres')
        	.then(response => {
	            console.log(response);
	          });
	},
})