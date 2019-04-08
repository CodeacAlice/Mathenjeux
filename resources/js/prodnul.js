const prodnul = new Vue ({
	el: '#prodnul',
	data: {
		x: 0,
		fact1: 2, fact2: 5, nb1: -2, nb2: 15,
	},
	computed: {
		sign1: function() {
			if (this.nb1 >= 0) {return '+ '}
			else {return ''}
		},
		sign2: function() {
			if (this.nb2 >= 0) {return '+ '}
			else {return ''}
		},
		res1: function () {
			return parseInt(this.fact1)*parseInt(this.x)+parseInt(this.nb1)
		},
		res2: function () {
			return parseInt(this.fact2)*parseInt(this.x)+parseInt(this.nb2)
		},
		res: function () {
			return parseInt(this.res1)*parseInt(this.res2)
		}
	}
})