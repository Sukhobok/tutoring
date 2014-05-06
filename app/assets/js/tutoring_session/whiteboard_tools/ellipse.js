var ellipseTool = new Tool();
ellipseTool.minDistance = 10;

ellipseTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = e.point;
};

ellipseTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	var temp = paths[path_index];
	paths[path_index].remove();

	var bounds = new Rectangle(temp.startingPoint, e.point);
	paths[path_index] = new Path.Ellipse(bounds);
	paths[path_index].style = styles[path_index];
	paths[path_index].startingPoint = temp.startingPoint;
};
