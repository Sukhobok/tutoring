var lineTool = new Tool();
lineTool.minDistance = 10;

lineTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = e.point;
};

lineTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	var temp = paths[path_index];
	paths[path_index].remove();

	paths[path_index] = new Path.Line(temp.startingPoint, e.point);
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = temp.startingPoint;
};
