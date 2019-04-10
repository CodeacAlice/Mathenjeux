<template>
	<div class="canvaContainer" id="bal1">
        <div class="equation">
          <input type="number" v-model="x" v-on:input="drawEq()">x 
          + <input type="number" v-model="y" v-on:input="drawEq()">y 
          + <input type="number" v-model="nbl" v-on:input="drawEq()"> 
          = <input type="number" v-model="z" v-on:input="drawEq()">z 
          + <input type="number" v-model="nbr" v-on:input="drawEq()">
        </div>
        <!-- <canvas id="canvasEq" width="720" height="250"></canvas> -->
        <canvas id="canvasEq" v-bind:width="c1width" v-bind:height="c1height"></canvas>

      </div>
</template>

<script type="text/javascript">
	export default {
		name: 'EqBalancea',
    	data() { 
            return {
                oX: 150, oY: 150, pol: 18,
                longP: 20, hautP: 20, longX: 20, hautX: 20, longY: 20, hautY: 20, 
                longZ: 20, hautZ: 20, longB: 300, hautB:200,
                x: 3, y: 2, nbl: 1,
                z: 7, nbr: 4,
                c1width: 300, c1height: 150,
            }
        },
        methods: {
            /* Structure de base, réinitialisation */
            struc() {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.beginPath();
                ctx.moveTo(this.oX, this.oY);
                ctx.lineTo(this.oX, this.oY-this.hautB);
                ctx.moveTo(this.oX, this.oY-this.hautB/4); ctx.lineTo(this.oX-this.longB, this.oY-this.hautB/4);
                ctx.moveTo(this.oX, this.oY-this.hautB/4); ctx.lineTo(this.oX+this.longB, this.oY-this.hautB/4);

                ctx.stroke();
            },

            clear() {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.clearRect(0, 0, this.c1width, this.c1height);
                ctx.beginPath();
                this.struc()
            },

            /* Dessins de chaque éléments */
            drawP(x,y) {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.fillText("P",x,y);
            },
            drawX(x,y) {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.fillText("X",x,y);
            },
            drawY(x,y) {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.fillText("Y",x,y);
            },
            drawZ(x,y) {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.fillText("Z",x,y);
            },

            /* Dessins des éq */
            drawLeft() {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.font = this.pol+"px Nunito";

                var x = this.oX-this.longB;
                var y = this.oY-this.hautB/4;

                for (var i = 1; i <= this.x; i++) {
                    this.drawX(x,y);
                    x += this.longX;
                    if (x > this.oX-this.longX) {x = this.oX-this.longB; y -= this.hautX;}
                }
                for (var i = 1; i <= this.y; i++) {
                    this.drawY(x,y);
                    x += this.longX;
                    if (x > this.oX-this.longY) {x = this.oX-this.longB; y -= this.hautY;}
                }
                for (var i = 1; i <= this.nbl; i++) {
                    this.drawP(x,y);
                    x += this.longP;
                    if (x > this.oX-this.longP) {x = this.oX-this.longB; y -= this.hautP;}
                }
            },

            drawRight() {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.font = this.pol+"px Nunito";

                var x = this.oX;
                var y = this.oY-this.hautB/4;

                for (var i = 1; i <= this.z; i++) {
                    this.drawZ(x,y);
                    x += this.longZ;
                    if (x > this.oX+this.longB-this.longZ) {x = this.oX; y -= this.hautZ;}
                }
                for (var i = 1; i <= this.nbr; i++) {
                    this.drawP(x,y);
                    x += this.longP;
                    if (x > this.oX+this.longB-this.longP) {x = this.oX; y -= this.hautP;}
                }
            },

            drawEq() {
                this.clear();
                this.drawLeft();this.drawRight();
            },
            handleResize(){
                var ctx = document.getElementById("canvasEq").getContext("2d");
                var windowWidth = $(window).width();
                console.log(windowWidth);
                if (windowWidth < 768) {
                    console.log('petit')
                    this.c1width = 280; this.c1height = 150;
                    this.oX = this.c1width/2; this.oY = this.c1height;

                    this.pol = 14; ctx.font = this.pol+"px Nunito";
                    this.longP = 16; this.hautP = 16;
                    this.longX = 16; this.hautX = 16;
                    this.longY = 16; this.hautY = 16;
                    this.longZ = 16; this.hautZ = 16;
                    this.longB = 100; this.hautB = 100;
                }
                else if (windowWidth < 1280) {
                    console.log('mthis.oyen');
                    this.c1width = 550; this.c1height = 200;
                    this.oX = this.c1width/2; this.oY = this.c1height;

                    this.pol = 16; ctx.font = this.pol+"px Nunito";
                    this.longP = 18; this.hautP = 18;
                    this.longX = 18; this.hautX = 18;
                    this.longY = 18; this.hautY = 18;
                    this.longZ = 18; this.hautZ = 18;
                    this.longB = 200; this.hautB = 150;
                }
                else {
                    console.log('grand');
                    this.c1width = 720; this.c1height = 250;
                    this.oX = this.c1width/2; this.oY = this.c1height;

                    this.pol = 18; ctx.font = this.pol+"px Nunito";
                    this.longP = 20; this.hautP = 20;
                    this.longX = 20; this.hautX = 20;
                    this.longY = 20; this.hautY = 20;
                    this.longZ = 20; this.hautZ = 20;
                    this.longB = 300; this.hautB = 200;
                }
                this.$nextTick(() => {
                    this.drawEq();
                })
            }
        },
        mounted() { 
            window.addEventListener('resize', this.handleResize);
            this.handleResize();
        }
    }
</script>