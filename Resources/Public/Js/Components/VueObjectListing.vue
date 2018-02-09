<template>
	<div class="object-listing">
		<header class="object-listing--header" v-if="header">{{header}}</header>

		<ul>
			<li v-for="object in objects">
				<vue-object
					v-bind:object="object"
					v-bind:key="object.id">
				</vue-object>
			</li>
		</ul>
	</div>
</template>

<script>
	import VueObject from './VueObject';

	export default {

		// @see: https://vuejs.org/v2/guide/components.html#Local-Registration
		components: {
			'vue-object': VueObject
		},

		props: ['header'],

		data: function() {
			return {
				objects: [
					{id: 1, title: 'Vue Object #01'},
					{id: 2, title: 'Vue Object #02'},
					{id: 3, title: 'Vue Object #03'}
				]
			}
		},

		methods: {},

		created: function() {
		}
	}
</script>