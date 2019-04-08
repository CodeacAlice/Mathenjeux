/* Eléments pour le dessin */
const c2 = document.getElementById("canvasEq2");
const ctx2 = c2.getContext("2d");

	/* Origine */
// const w2 = c2.width;
// const h2 = c2.height;
var oX2
var oY2
//ctx.translate(oX, oY);

	/* Tailles */
var longN; var hautN;
var rayonI; var longI; var hautI;
var longB2; var hautB2;

var yl;
var yr;




const bal2 = new Vue ({
	el: '#bal2',
	data: {
		// Taille du canvas
		c2width: 280, c2height: 100,
		// Initialiser l'éq
		orxl: 2, ornbl: 5, orxr: -3, ornbr: -5,
		// Affiche l'éq
		xl: 2, nbl: 5, xr: -3, nbr: -5,
		// Modifier l'éq
		multl: 1, divl: 1, multr: 1, divr: 1,
		addp: 0, addi: 0, mult: 1, div: 1,
		// Fin, erreurs
		fail: false, erreur: '',
	},
	methods: {
		/* Structure de base, réinitialisation */
		struc() {
			if (this.tilting == "left") {
				yl = oY2-hautB2/8;
				yr = oY2-(3*hautB2/8);
			}
			else if (this.tilting == "right") {
				yl = oY2-(3*hautB2/8);
				yr = oY2-hautB2/8;
			}
			else {
				yl = oY2-hautB2/4;
				yr = oY2-hautB2/4;
			}
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.moveTo(oX2, oY2); ctx2.lineTo(oX2, oY2-hautB2);
			ctx2.moveTo(oX2, yl); ctx2.lineTo(oX2-longB2, yl);
			ctx2.moveTo(oX2, yr); ctx2.lineTo(oX2+longB2, yr);

			ctx2.stroke();
		},

		clear() {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.clearRect(0, 0, this.c2width, this.c2height);
			ctx2.beginPath();
			this.struc()
		},
		reload() {
			this.xl = this.orxl;
			this.xr = this.orxr;
			this.nbl = this.ornbl;
			this.nbr = this.ornbr;
			this.fail = false; this.erreur = '';
			this.drawEq();
		},

		/* Dessins de chaque éléments */
		drawNplus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.moveTo(x, y);
			ctx2.lineTo(x+longN,y);
			ctx2.lineTo(x+longN,y-hautN);
			ctx2.lineTo(x,y-hautN);
			ctx2.lineTo(x,y);

			ctx2.moveTo(x+longN/4, y-hautN/2);
			ctx2.lineTo(x+3*longN/4, y-hautN/2);
			ctx2.moveTo(x+longN/2, y-hautN/4);
			ctx2.lineTo(x+longN/2, y- 3*hautN/4);

			ctx2.stroke();
		},
		drawNminus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.moveTo(x, y);
			ctx2.lineTo(x+longN,y);
			ctx2.lineTo(x+longN,y-hautN);
			ctx2.lineTo(x,y-hautN);
			ctx2.lineTo(x,y);

			ctx2.moveTo(x+longN/4, y-hautN/2);
			ctx2.lineTo(x+3*longN/4, y-hautN/2);

			ctx2.stroke();
		},
		drawIplus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.arc(x+rayonI, y - rayonI, rayonI, 0, 2 * Math.PI);

			ctx2.moveTo(x+longI/4, y-hautI/2);
			ctx2.lineTo(x+3*longI/4, y-hautI/2);
			ctx2.moveTo(x+longI/2, y-hautI/4);
			ctx2.lineTo(x+longI/2, y- 3*hautI/4);
			ctx2.stroke();
		},
		drawIminus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.arc(x+rayonI, y - rayonI, rayonI, 0, 2 * Math.PI);

			ctx2.moveTo(x+longI/4, y-hautI/2);
			ctx2.lineTo(x+3*longI/4, y-hautI/2);
			ctx2.stroke();
		},

		/* Dessins des éq */
		drawLeft() {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			
			var x = oX2-longB2;
			var y = yl;
			if (this.nbl > 0) {
				for (var i = 1; i <= this.nbl; i++) {
					this.drawNplus(x,y);
					x += longN;
					if (x > oX2-longN) {x = oX2-longB2; y -= hautN;}
				}
			} else if (this.nbl < 0) {
				for (var i = -1; i >= this.nbl; i--) {
					this.drawNminus(x,y);
					x += longN;
					if (x > oX2-longN) {x = oX2-longB2; y -= hautN;}
				}
			}
			if (this.xl > 0) {
				for (var i = 1; i <= this.xl; i++) {
					this.drawIplus(x,y);
					x += longN;
					if (x > oX2-longI) {x = oX2-longB2; y -= hautI;}
				}
			} else if (this.xl < 0) {
				for (var i = -1; i >= this.xl; i--) {
					this.drawIminus(x,y);
					x += longN;
					if (x > oX2-longI) {x = oX2-longB2; y -= hautI;}
				}
			}
		},

		drawRight() {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");

			var x = oX2;
			var y = yr;

			if (this.nbr > 0) {
				for (var i = 1; i <= this.nbr; i++) {
					this.drawNplus(x,y);
					x += longN;
					if (x > oX2+longB2-longN) {x = oX2; y -= hautN;}
				}
			} else if (this.nbr < 0) {
				for (var i = -1; i >= this.nbr; i--) {
					this.drawNminus(x,y);
					x += longN;
					if (x > oX2+longB2-longN) {x = oX2; y -= hautN;}
				}
			}
			if (this.xr > 0) {
				for (var i = 1; i <= this.xr; i++) {
					this.drawIplus(x,y);
					x += longN;
					if (x > oX2+longB2-longI) {x = oX2; y -= hautI;}
				}
			} else if (this.xr < 0) {
				for (var i = -1; i >= this.xr; i--) {
					this.drawIminus(x,y);
					x += longN;
					if (x > oX2+longB2-longI) {x = oX2; y -= hautI;}
				}
			}
		},

		drawEq() {
			this.clear();
			this.drawLeft();this.drawRight();
		},

		/* Modifier l'éq */
		multL() {
			var m = parseFloat(this.multl);
			this.xl *= m;
			this.nbl *= m;
			this.drawEq();
		},
		multR() {
			var m = parseFloat(this.multr);
			this.xr *= m;
			this.nbr *= m;
			this.drawEq();
		},
		divL() {
			var d = parseFloat(this.divl);
			if (d === 0) {
				this.erreur = 'Horreur, vous avez divisé par zéro !';
				this.fail = true;
			}
			else {
				this.xl /= d;
				this.nbl /= d;
				this.drawEq();
			}
		},
		divR() {
			var d = parseFloat(this.divr);
			if (d === 0) {
				this.erreur = 'Vous avez divisé par zéro !';
				this.fail = true;
			}
			else {
				this.xr /= d;
				this.nbr /= d;
				this.drawEq();
			}
		},
		addP() {
			this.nbl += parseFloat(this.addp);
			this.nbr += parseFloat(this.addp);
			this.drawEq();
		},
		addI() {
			this.xl += parseFloat(this.addi);
			this.xr += parseFloat(this.addi);
			this.drawEq();
		},
		multB() {
			var m = parseFloat(this.mult);
			this.xl *= m;
			this.nbl *= m;
			this.xr *= m;
			this.nbr *= m;
			this.drawEq();
			if (m === 0) {
				this.erreur = '...';
				this.fail = true;
			}
		},
		divB() {
			var d = parseFloat(this.div);
			if (d === 0) {
				this.erreur = 'On. Ne. Divise. PAS. Par. ZERO !!!';
				this.fail = true;
			} else {
				this.xl /= d;
				this.nbl /= d;
				this.xr /= d;
				this.nbr /= d;
				this.drawEq();
			}
		},
		handleResize(){
			var windowWidth = $(window).width();
			console.log(windowWidth);
			if (windowWidth < 768) {
				console.log('petit')
				this.c2width = 300; this.c2height = 150;
				oX2 = this.c2width/2; oY2 = this.c2height;

				longN = 20; hautN = 20;
				rayonI = 10; longI = 20; hautI = 20;
				longB2 = 100; hautB2 = 100;

				yl = oY2-hautB2/4;
				yr = oY2-hautB2/4;
			}
			else if (windowWidth < 1280) {
				console.log('moyen');
				this.c2width = 550; this.c2height = 200;
				oX2 = this.c2width/2; oY2 = this.c2height;

				longN = 20; hautN = 20;
				rayonI = 10; longI = 20; hautI = 20;
				longB2 = 200; hautB2 = 150;

				yl = oY2-hautB2/4;
				yr = oY2-hautB2/4;
			}
			else {
				console.log('grand');
				this.c2width = 550; this.c2height = 250;
				oX2 = this.c2width/2; oY2 = this.c2height;

				longN = 20; hautN = 20;
				rayonI = 10; longI = 20; hautI = 20;
				longB2 = 200; hautB2 = 175;

				yl = oY2-hautB2/4;
				yr = oY2-hautB2/4;
			}
	        this.$nextTick(() => {
	        	this.drawEq();
	        })
		},
	},
	mounted() { 
		window.addEventListener('resize', this.handleResize);
        this.handleResize();
	},
	computed: {
		valx: function () {
			return (this.ornbr - this.ornbl) / (this.orxl - this.orxr)
		},
		signr: function() {
			if (this.nbr < 0) {return ''}
				else {return '+'}
		},
		signl: function() {
			if (this.nbl < 0) {return ''}
				else {return '+'}
		},
		tilting: function () {
			var left = parseFloat(this.xl) * parseFloat(this.valx) + parseFloat(this.nbl);
			var right = parseFloat(this.xr) * parseFloat(this.valx) + parseFloat(this.nbr);
			var leftar = parseInt(left*1000)/1000;
			var rightar = parseInt(right*1000)/1000;
			if (leftar > rightar) {
				this.erreur = 'Oups...'
				this.fail = true;
				return "left"
			}
				else if (leftar < rightar) {
				this.erreur = 'Oups...'
				this.fail = true;
					return "right"
				}
					else {return false}
		},
		sign: function () {
			if (this.tilting == "left") {return '>'}
			else if (this.tilting == "right") {return '<'}
			else {return '='}
		},
		done: function () {
			return (this.xl === 1 && this.xr === 0 && this.nbl === 0 && this.nbr === this.valx)
				|| (this.xr === 1 && this.xl === 0 && this.nbr === 0 && this.nbl === this.valx)
		}
	}
})
