// var Vue = require('vue');
//
// Vue.component('vue-object-listing', require('./Components/VueObjectListing'));
//
// const application = new Vue({
// 	el: '#vue-application'
// });

$('.api-call--get').each(function() {
	var container = $(this);
	var url = $(this).data('api-url');

	$.ajax({
		url: url,
		dataType: 'json',
		success: function(response) {
			container
				.css('color', '#62a60a')
				.text('\Cext\Play\Domain\Model\Example [' + response.uid + ']');
		}
	});
});