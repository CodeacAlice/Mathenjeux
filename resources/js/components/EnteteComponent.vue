<template>
	<div id="entete">
		<div id="logo"><svg-logo></svg-logo></div>
		<div>
			<h1>{{titre}}</h1>
			<h2>{{sstitre}}</h2>
		</div>
		<div id="triangle1" class="tri"><svg-triangle></svg-triangle></div>
		<div id="triangle2" class="tri"><svg-triangleb></svg-triangleb></div>
	</div>
</template>

<script>
import SvgTriangle from './SvgTriangle.vue';
import SvgTriangleb from './SvgTriangleb.vue';
import SvgLogo from './SvgLogo.vue';

export default {
	name: 'EnteteComponent',
	components: {
		SvgTriangle,
		SvgTriangleb,
		SvgLogo,
	},
	props: {
		titre: String,
		sstitre: String,
	}
}
</script>