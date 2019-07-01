<template>
	<div id="bal2">
		<div id="bal2can">
			<div id="bal2gche">À gauche&nbsp;:<br>
				<div>
					Inconnues&nbsp;: <input v-show="!fail && !done" type="number" v-model="xl" v-on:input="drawEq()"><span v-show="fail || done">{{xl}}</span><br class="onlydesktop">
					Poids&nbsp;: <input v-show="!fail && !done" type="number" v-model="nbl" v-on:input="drawEq()"><span v-show="fail || done">{{nbl}}</span><br>
					<button v-show="!fail && !done" v-on:click="multL()">Mult<span class="notmobile">iplier</span> par&nbsp;:</button> <input v-show="!fail && !done" type="number" v-model="multl"><br class="notmobile">
					<button v-show="!fail && !done" v-on:click="divL()">Div<span class="notmobile">iser</span> par&nbsp;:</button> <input v-show="!fail && !done" type="number" v-model="divl">
				</div>
			</div>

			<div id="bal2canva"><canvas id="canvasEq2" v-bind:width="c2width" v-bind:height="c2height"></canvas></div>

			<div id="bal2dte">À droite&nbsp;:<br>
				<div>
					Inconnues&nbsp;: <input v-show="!fail && !done" type="number" v-model="xr" v-on:input="drawEq()"><span v-show="fail || done">{{xr}}</span><br class="onlydesktop">
					Poids&nbsp;: <input v-show="!fail && !done" type="number" v-model="nbr" v-on:input="drawEq()"><span v-show="fail || done">{{nbr}}</span><br>
					<button v-show="!fail && !done" v-on:click="multR()">Mult<span class="notmobile">iplier</span> par&nbsp;:</button> <input v-show="!fail && !done" type="number" v-model="multr"><br class="notmobile">
					<button v-show="!fail && !done" v-on:click="divR()">Div<span class="notmobile">iser</span> par&nbsp;:</button> <input v-show="!fail && !done" type="number" v-model="divr">
				</div>
			</div>
		</div>

		<div class="equation">{{xl}}x {{signl}} {{nbl}} {{sign}} {{xr}}x {{signr}} {{nbr}}</div>
		<div v-show="!fail && !done">
			Sur les deux plateaux&nbsp;:<br>
			<button v-on:click="addI()">Ajouter</button> <input type="number" v-model="addi"> inconnues&nbsp;; <br class="onlymobile">
			<button v-on:click="addP()">Ajouter</button> <input type="number" v-model="addp"> poids<br>
			<button v-on:click="multB()">Multiplier par</button> <input type="number" v-model="mult">&nbsp;; <br class="onlymobile">
			<button v-on:click="divB()">Diviser par</button> <input type="number" v-model="div">
		</div>
		<div v-if="fail">{{erreur}} <button v-on:click="reload()">Recommencer&nbsp;?</button></div>
		<div v-if="done">Félicitations&nbsp;! :D <button v-on:click="reload()">Recommencer&nbsp;?</button></div>
	</div>
</template>

<script type="text/javascript">
export default {
	name: 'EqBalanceb',
	data () { 
		return {
			// Taille du canvas
			c2width: 280, c2height: 100, oX2: 140, oY2: 100,
			// Tailles des éléments
			longN: 20, hautN: 20, rayonI: 10, longI: 20, hautI: 20,
			// Taille de la balance
			longB2: 200, hautB2: 175, yl: 56, yr: 56,
			// Initialiser l'éq
			orxl: 2, ornbl: 5, orxr: -3, ornbr: -5,
			// Affiche l'éq
			xl: 2, nbl: 5, xr: -3, nbr: -5,
			// Modifier l'éq
			multl: 1, divl: 1, multr: 1, divr: 1,
			addp: 0, addi: 0, mult: 1, div: 1,
			// Fin, erreurs
			fail: false, erreur: '',
		}
	},
	methods: {
		/* Structure de base, réinitialisation */
		struc() {
			if (this.tilting == "left") {
				this.yl = this.oY2-this.hautB2/8;
				this.yr = this.oY2-(3*this.hautB2/8);
			}
			else if (this.tilting == "right") {
				this.yl = this.oY2-(3*this.hautB2/8);
				this.yr = this.oY2-this.hautB2/8;
			}
			else {
				this.yl = this.oY2-this.hautB2/4;
				this.yr = this.oY2-this.hautB2/4;
			}
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.moveTo(this.oX2, this.oY2); ctx2.lineTo(this.oX2, this.oY2-this.hautB2);
			ctx2.moveTo(this.oX2, this.yl); ctx2.lineTo(this.oX2-this.longB2, this.yl);
			ctx2.moveTo(this.oX2, this.yr); ctx2.lineTo(this.oX2+this.longB2, this.yr);

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
			ctx2.lineTo(x+this.longN,y);
			ctx2.lineTo(x+this.longN,y-this.hautN);
			ctx2.lineTo(x,y-this.hautN);
			ctx2.lineTo(x,y);

			ctx2.moveTo(x+this.longN/4, y-this.hautN/2);
			ctx2.lineTo(x+3*this.longN/4, y-this.hautN/2);
			ctx2.moveTo(x+this.longN/2, y-this.hautN/4);
			ctx2.lineTo(x+this.longN/2, y- 3*this.hautN/4);

			ctx2.stroke();
		},
		drawNminus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.moveTo(x, y);
			ctx2.lineTo(x+this.longN,y);
			ctx2.lineTo(x+this.longN,y-this.hautN);
			ctx2.lineTo(x,y-this.hautN);
			ctx2.lineTo(x,y);

			ctx2.moveTo(x+this.longN/4, y-this.hautN/2);
			ctx2.lineTo(x+3*this.longN/4, y-this.hautN/2);

			ctx2.stroke();
		},
		drawIplus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.arc(x+this.rayonI, y - this.rayonI, this.rayonI, 0, 2 * Math.PI);

			ctx2.moveTo(x+this.longI/4, y-this.hautI/2);
			ctx2.lineTo(x+3*this.longI/4, y-this.hautI/2);
			ctx2.moveTo(x+this.longI/2, y-this.hautI/4);
			ctx2.lineTo(x+this.longI/2, y- 3*this.hautI/4);
			ctx2.stroke();
		},
		drawIminus(x,y) {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			ctx2.beginPath();
			ctx2.arc(x+this.rayonI, y - this.rayonI, this.rayonI, 0, 2 * Math.PI);

			ctx2.moveTo(x+this.longI/4, y-this.hautI/2);
			ctx2.lineTo(x+3*this.longI/4, y-this.hautI/2);
			ctx2.stroke();
		},

		/* Dessins des éq */
		drawLeft() {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");
			
			var x = this.oX2-this.longB2;
			var y = this.yl;
			if (this.nbl > 0) {
				for (var i = 1; i <= this.nbl; i++) {
					this.drawNplus(x,y);
					x += this.longN;
					if (x > this.oX2-this.longN) {x = this.oX2-this.longB2; y -= this.hautN;}
				}
			} else if (this.nbl < 0) {
				for (var i = -1; i >= this.nbl; i--) {
					this.drawNminus(x,y);
					x += this.longN;
					if (x > this.oX2-this.longN) {x = this.oX2-this.longB2; y -= this.hautN;}
				}
			}
			if (this.xl > 0) {
				for (var i = 1; i <= this.xl; i++) {
					this.drawIplus(x,y);
					x += this.longN;
					if (x > this.oX2-this.longI) {x = this.oX2-this.longB2; y -= this.hautI;}
				}
			} else if (this.xl < 0) {
				for (var i = -1; i >= this.xl; i--) {
					this.drawIminus(x,y);
					x += this.longN;
					if (x > this.oX2-this.longI) {x = this.oX2-this.longB2; y -= this.hautI;}
				}
			}
		},

		drawRight() {
			var ctx2 = document.getElementById("canvasEq2").getContext("2d");

			var x = this.oX2;
			var y = this.yr;

			if (this.nbr > 0) {
				for (var i = 1; i <= this.nbr; i++) {
					this.drawNplus(x,y);
					x += this.longN;
					if (x > this.oX2+this.longB2-this.longN) {x = this.oX2; y -= this.hautN;}
				}
			} else if (this.nbr < 0) {
				for (var i = -1; i >= this.nbr; i--) {
					this.drawNminus(x,y);
					x += this.longN;
					if (x > this.oX2+this.longB2-this.longN) {x = this.oX2; y -= this.hautN;}
				}
			}
			if (this.xr > 0) {
				for (var i = 1; i <= this.xr; i++) {
					this.drawIplus(x,y);
					x += this.longN;
					if (x > this.oX2+this.longB2-this.longI) {x = this.oX2; y -= this.hautI;}
				}
			} else if (this.xr < 0) {
				for (var i = -1; i >= this.xr; i--) {
					this.drawIminus(x,y);
					x += this.longN;
					if (x > this.oX2+this.longB2-this.longI) {x = this.oX2; y -= this.hautI;}
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
			if (this.xl == 0 && this.nbl == 0 && this.xr == 0 && this.nbr == 0) {
				this.fail = true;
				this.erreur = 'Hmm, on dirait bien que vous ne pouvez plus continuer...'
			}
		},
		multR() {
			var m = parseFloat(this.multr);
			this.xr *= m;
			this.nbr *= m;
			this.drawEq();
			if (this.xl == 0 && this.nbl == 0 && this.xr == 0 && this.nbr == 0) {
				this.fail = true;
				this.erreur = 'Coincé ?'
			}
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
			if (windowWidth < 768) {
				this.c2width = 300; this.c2height = 150;
				this.oX2 = this.c2width/2; this.oY2 = this.c2height;

				this.longN = 20; this.hautN = 20;
				this.rayonI = 10; this.longI = 20; this.hautI = 20;
				this.longB2 = 100; this.hautB2 = 100;

				this.yl = this.oY2-this.hautB2/4;
				this.yr = this.oY2-this.hautB2/4;
			}
			else if (windowWidth < 1280) {
				this.c2width = 550; this.c2height = 200;
				this.oX2 = this.c2width/2; this.oY2 = this.c2height;

				this.longN = 20; this.hautN = 20;
				this.rayonI = 10; this.longI = 20; this.hautI = 20;
				this.longB2 = 200; this.hautB2 = 150;

				this.yl = this.oY2-this.hautB2/4;
				this.yr = this.oY2-this.hautB2/4;
			}
			else {
				this.c2width = 550; this.c2height = 250;
				this.oX2 = this.c2width/2; this.oY2 = this.c2height;

				this.longN = 20; this.hautN = 20;
				this.rayonI = 10; this.longI = 20; this.hautI = 20;
				this.longB2 = 200; this.hautB2 = 175;

				this.yl = this.oY2-this.hautB2/4;
				this.yr = this.oY2-this.hautB2/4;
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
}





</script>
