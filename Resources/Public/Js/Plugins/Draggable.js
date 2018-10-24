var draggable = document.getElementById('draggable');
var position = {
	initial: {
		x: 32,
		y: 106
	},
	dragstart: {
		x: 0,
		y: 0
	},
	offset: {
		x: 0,
		y: 0
	}
};
var puffer = 20;

var execute = false;

draggable.addEventListener('mousedown', function(event) {
	execute = true;
	// console.log('mousedown', event.target.offsetLeft);

	position.dragstart.x = event.clientX - position.offset.x;
	position.dragstart.y = event.clientY - position.offset.y;

	console.log(event.clientX, position.dragstart.x, position.offset.x);

}, false);

document.addEventListener('mousemove', function(event) {
	if(execute === true) {

		x = event.clientX - position.dragstart.x;

		if(x >= (700 + puffer) || x < 0) {
			x = 700 + puffer;
		}

		position.offset.x = x;
		position.offset.y = event.clientY - position.dragstart.y;

		var translate = 'translate(' + position.offset.x + 'px,' + position.offset.y + 'px)';
		draggable.style.transform = translate;
	}
}, false);

document.addEventListener('mouseup', function(event) {
	execute = false;
	console.log('mouseup', event);
}, false);