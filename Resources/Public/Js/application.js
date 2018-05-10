require('./Plugins/Notification');


$('.notification').notification({
});

$('.notification--update').on('click', function() {
	$('.notification').notification('update');
});