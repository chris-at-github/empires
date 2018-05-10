require('./Plugins/Notification');

var d = new Date();
var lastLogin = Math.round(d.getTime() / 1000) - (86400 * 7);

console.log(lastLogin);

$('.notification').notification({
	lastNotification: lastLogin
});

$('.notification--update').on('click', function() {
	$('.notification').notification('update');
});