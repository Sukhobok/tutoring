var paths = [];
var styles = [];

styles[0] = {
	strokeColor: '#ed1c24',
	strokeWidth: 2
};

styles[1] = {
	strokeColor: '#ed1c24',
	strokeWidth: 2
};

project.layers[0].redoChildren = [];

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
