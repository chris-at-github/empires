<template>
	<div class="object-listing">
		<header class="object-listing--header" v-if="header">{{header}}</header>
	</div>
</template>

<script>
	export default {
		props: ['header'],

		data: function() {
			return {
				settings:     {},
				scene:        {},
				windowWidth:  window.innerWidth,
				windowHeight: window.innerHeight
			}
		},

		methods: {},

		created: function() {
		}
	}
</script>