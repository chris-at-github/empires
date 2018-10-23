// require('./Plugins/Notification');
//
// var d = new Date();
// var lastLogin = Math.round(d.getTime() / 1000) - (86400 * 7);
//
// $('.notification').notification({
// 	lastNotification: lastLogin,
// 	onUpdate: function(_, timestamp) {
// 		console.log(_, timestamp);
// 	}
// });
//
// $('.notification--update').on('click', function() {
// 	$('.notification').notification('update');
// });