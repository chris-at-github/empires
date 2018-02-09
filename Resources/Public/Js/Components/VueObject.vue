<template>
	<div class="object">
		<header class="object--header">{{title}} [{{id}}]</header>
	</div>
</template>

<script>
	export default {
		props: ['object'],

		data: function() {
			return {
				id: this.object.id,
				title: this.object.title
			}
		}
	}
</script>