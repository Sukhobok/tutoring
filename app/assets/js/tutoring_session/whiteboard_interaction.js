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
$(document).on('click', '.ts-whiteboard-undo', function () { tsUndo(); });
$(document).on('click', '.ts-whiteboard-redo', function () { tsRedo(); });
$(document).on('click', '.ts-whiteboard-clear', function () { tsClear(); });

/**
 * Tabs
 */
$(document).on('click', '#ts-whiteboard-tab-add', function () { tsAddTab(); });
$(document).on('click', '.ts-whiteboard-tools-remove-tab', function () { tsRemoveTab(); });
$(document).on('click', '.ts-whiteboard-tab', function () { tsFocusTab(this.getAttribute('data-ts-tab-id')); });
