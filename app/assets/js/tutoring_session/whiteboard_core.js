var paths = [];
var styles = [];

styles[0] = {
	strokeColor: '#ed1c24',
	strokeWidth: 2
};
styles[1] = styles[0];
project.layers[0].redoChildren = [];

/**
 * Select tool
 */
var selectTool = function (tool) {
	$('.ts-whiteboard-tool').removeClass('is-selected');
	$('.ts-whiteboard-tools-' + tool).addClass('is-selected');

	switch (tool) {
		case 'pencil':
			pencilTool.activate();
			break;

		case 'erase':
			eraseTool.activate();
			break;

		case 'rectangle':
			rectangleTool.activate();
			break;

		case 'ellipse':
			ellipseTool.activate();
			break;

		default:
			lineTool.activate();
	}
};

$(document).on('click', '.ts-whiteboard-tools-pencil', function () { selectTool('pencil'); });
$(document).on('click', '.ts-whiteboard-tools-erase', function () { selectTool('erase'); });
$(document).on('click', '.ts-whiteboard-tools-rectangle', function () { selectTool('rectangle'); });
$(document).on('click', '.ts-whiteboard-tools-ellipse', function () { selectTool('ellipse'); });
$(document).on('click', '.ts-whiteboard-tools-line', function () { selectTool('line'); });

/**
 * Undo / Redo / Clear
 */
var tsUndo = function () {
	if(project.activeLayer.lastChild !== null) {
		project.activeLayer.redoChildren.push(project.activeLayer.lastChild);
		project.activeLayer.lastChild.remove();
		project.view.update();
	}
};

var tsRedo = function () {
	if(project.activeLayer.redoChildren.length !== 0) {
		var _to_redo = project.activeLayer.redoChildren.pop();
		project.activeLayer.addChild(_to_redo);
		project.view.update();
	}
};

var tsClear = function () {
	project.activeLayer.removeChildren();
	project.view.update();
};

$(document).on('click', '.ts-whiteboard-undo', function () { tsUndo(); });
$(document).on('click', '.ts-whiteboard-redo', function () { tsRedo(); });
$(document).on('click', '.ts-whiteboard-clear', function () { tsClear(); });
