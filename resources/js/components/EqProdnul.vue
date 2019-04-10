<template>
	<div id="prodnul">
        <div class="equation">({{fact1}}x {{sign1}}{{nb1}})*({{fact2}}x {{sign2}}{{nb2}}) = 0 </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; padding-top: 20px;">
          <div style="text-align: center;">x = <input type="number" v-model="x"></div>
          <div>
            {{fact1}}x {{sign1}}{{nb1}} = {{ res1 }} ; <span v-if="res1===0">✔️</span><br>
            {{fact2}}x {{sign2}}{{nb2}} = {{ res2 }} ; <span v-if="res2===0">✔️</span><br>
            ({{fact1}}x {{sign1}}{{nb1}})*({{fact2}}x {{sign2}}{{nb2}}) = {{ res }} 
            <span v-if="res===0">✔️ 😊</span>
          </div>
        </div>
      </div>
</template>

<script type="text/javascript">
	export default {
		name: 'EqProdnul',
		data() {
			return {
				x: 0,
				fact1: 2, fact2: 5, nb1: -2, nb2: 15,
			}
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
	}
</script>