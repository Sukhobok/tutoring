var pencilTool = new Tool();
pencilTool.minDistance = 10;

pencilTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].add(e.point);
};

pencilTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index].add(e.point);
	paths[path_index].smooth();
};
