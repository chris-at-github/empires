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
		},
		error: function(error) {

			console.log(error);

			container
				.css('color', '#f00')
				.text(error.status + ': ' + error.statusText);
		}
	});
});

$('.api-call--set').each(function() {
	var container = $(this);
	var url = $(this).data('api-url');
	var data = {};

	container.find('.api-call--data').each(function() {
		var name = $(this).attr('name');
		var value = $(this).val();

		data[name] = value;
	});

	// Fehler provozieren
	data['tx_play_api[example][title]'] = '';

	$.ajax({
		url: url,
		method: 'get',
		dataType: 'json',
		data: data,
		success: function(response) {
			console.log(response);
			// container
			// 	.css('color', '#62a60a')
			// 	.text('\Cext\Play\Domain\Model\Example [' + response.uid + ']');
		},
		error: function(error) {
			console.log(error);
			// container
			// 	.css('color', '#f00')
			// 	.text(error.status + ': ' + error.statusText);
		}
	});
});