/**
 * Colors open/close
 */
$(document).on('click', '.ts-whiteboard-tools-colors', function () {
	if($(this).width() == 36) {
		$(this).animate({
			width: 311
		});
	} else {
		$(this).animate({
			width: 36
		});
	}
});

/**
 * Sizes open/close
 */
$(document).on('click', '.ts-whiteboard-tools-sizes', function () {
	if($(this).width() == 36) {
		$(this).animate({
			width: 233
		});
	} else {
		$(this).animate({
			width: 36
		});
	}
});


////////////////////////////////////////////

var paths = [];
var styles = [];
styles[0] = {
	strokeColor: 'red',
	strokeWidth: 2
};
styles[1] = styles[0];

/**
 * Pencil Tool
 */
var pencilTool = new Tool();

pencilTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].add(e.point);

	pencilTool.minDistance = styles[path_index].strokeWidth/2;
};

pencilTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index].add(e.point);
	paths[path_index].smooth();
};

/**
 * Rectangle Tool
 */
var rectangleTool = new Tool();
rectangleTool.minDistance = 20;

rectangleTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = e.point;

	rectangleTool.minDistance = styles[path_index].strokeWidth/2;
};

rectangleTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	var temp = paths[path_index];
	paths[path_index].remove();

	paths[path_index] = new Path.Rectangle(temp.startingPoint, e.point);
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = temp.startingPoint;
};

/**
 * Circle Tool
 */
var circleTool = new Tool();
circleTool.minDistance = 20;

circleTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = e.point;
	
	circleTool.minDistance = styles[path_index].strokeWidth/2;
};

circleTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	var temp = paths[path_index];
	paths[path_index].remove();

	var bounds = new Rectangle(temp.startingPoint, e.point);
	paths[path_index] = new Path.Ellipse(bounds);
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = temp.startingPoint;
};

/**
 * Line Tool
 */
var lineTool = new Tool();
lineTool.minDistance = 20;

lineTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = e.point;

	lineTool.minDistance = styles[path_index].strokeWidth/2;
};

lineTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	var temp = paths[path_index];
	paths[path_index].remove();

	paths[path_index] = new Path.Line(temp.startingPoint, e.point);
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = temp.startingPoint;
};

/**
**/

pencilTool.activate();

var selectTool = function (tool) {
	$('.ts-whiteboard-tool').removeClass('is-selected');
	$('.ts-whiteboard-tools-' + tool).addClass('is-selected');

	switch (tool) {
		case 'draw':
			pencilTool.activate();
			break;

		case 'rectangle':
			rectangleTool.activate();
			break;

		case 'circle':
			circleTool.activate();
			break;

		default:
			lineTool.activate();
	}
}

$(document).on('click', '.ts-whiteboard-tools-draw', function () { selectTool('draw'); });
$(document).on('click', '.ts-whiteboard-tools-erase', function () { selectTool('erase'); });
$(document).on('click', '.ts-whiteboard-tools-rectangle', function () { selectTool('rectangle'); });
$(document).on('click', '.ts-whiteboard-tools-circle', function () { selectTool('circle'); });
$(document).on('click', '.ts-whiteboard-tools-line', function () { selectTool('line'); });
