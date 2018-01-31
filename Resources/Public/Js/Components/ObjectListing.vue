<template>
	<div class="object-listing">
		<header class="object-listing--header" v-if="header">{{header}}</header>

		<ul>
			<li v-for="object in objects">
				{{object.title}} [{{object.id}}]
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
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