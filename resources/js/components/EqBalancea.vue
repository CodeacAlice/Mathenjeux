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
	import ChaplistDomaine from './ChaplistDomaine.vue';
	import axios from 'axios';

	export default {
		name: 'EqBalancea',
    	data() { return {
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
                ctx.moveTo(oX, oY);
                ctx.lineTo(oX, oY-hautB);
                ctx.moveTo(oX, oY-hautB/4); ctx.lineTo(oX-longB, oY-hautB/4);
                ctx.moveTo(oX, oY-hautB/4); ctx.lineTo(oX+longB, oY-hautB/4);

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
                ctx.font = pol+"px Nunito";

                var x = oX-longB;
                var y = oY-hautB/4;

                for (var i = 1; i <= this.x; i++) {
                    this.drawX(x,y);
                    x += longX;
                    if (x > oX-longX) {x = oX-longB; y -= hautX;}
                }
                for (var i = 1; i <= this.y; i++) {
                    this.drawY(x,y);
                    x += longX;
                    if (x > oX-longY) {x = oX-longB; y -= hautY;}
                }
                for (var i = 1; i <= this.nbl; i++) {
                    this.drawP(x,y);
                    x += longP;
                    if (x > oX-longP) {x = oX-longB; y -= hautP;}
                }
            },

            drawRight() {
                var ctx = document.getElementById("canvasEq").getContext("2d");
                ctx.font = pol+"px Nunito";

                var x = oX;
                var y = oY-hautB/4;

                for (var i = 1; i <= this.z; i++) {
                    this.drawZ(x,y);
                    x += longZ;
                    if (x > oX+longB-longZ) {x = oX; y -= hautZ;}
                }
                for (var i = 1; i <= this.nbr; i++) {
                    this.drawP(x,y);
                    x += longP;
                    if (x > oX+longB-longP) {x = oX; y -= hautP;}
                }
            },

            drawEq() {
                this.clear();
                this.drawLeft();this.drawRight();
            },
            handleResize(){
                var windowWidth = $(window).width();
                console.log(windowWidth);
                if (windowWidth < 768) {
                    console.log('petit')
                    this.c1width = 280; this.c1height = 150;
                    oX = this.c1width/2; oY = this.c1height;

                    pol = 14; ctx.font = pol+"px Nunito";
                    longP = 16; hautP = 16;
                    longX = 16; hautX = 16;
                    longY = 16; hautY = 16;
                    longZ = 16; hautZ = 16;
                    longB = 100; hautB = 100;
                }
                else if (windowWidth < 1280) {
                    console.log('moyen');
                    this.c1width = 550; this.c1height = 200;
                    oX = this.c1width/2; oY = this.c1height;

                    pol = 16; ctx.font = pol+"px Nunito";
                    longP = 18; hautP = 18;
                    longX = 18; hautX = 18;
                    longY = 18; hautY = 18;
                    longZ = 18; hautZ = 18;
                    longB = 200; hautB = 150;
                }
                else {
                    console.log('grand');
                    this.c1width = 720; this.c1height = 250;
                    oX = this.c1width/2; oY = this.c1height;

                    pol = 18; ctx.font = pol+"px Nunito";
                    longP = 20; hautP = 20;
                    longX = 20; hautX = 20;
                    longY = 20; hautY = 20;
                    longZ = 20; hautZ = 20;
                    longB = 300; hautB = 200;
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