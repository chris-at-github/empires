<template>
	<div class="object-listing">
		<header class="object-listing--header" v-if="header">{{header}}</header>

		<ul>
			<li v-for="object in objects">
				<play-object
					v-bind:object="object"
					v-bind:key="object.id">
				</play-object>
			</li>
		</ul>
	</div>
</template>

<script>
	import PlayObject from './PlayObject';

	export default {

		// @see: https://vuejs.org/v2/guide/components.html#Local-Registration
		components: {
			'play-object': PlayObject
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