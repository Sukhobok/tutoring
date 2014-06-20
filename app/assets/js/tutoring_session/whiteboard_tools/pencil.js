var pencilTool = new Tool();
pencilTool.minDistance = 10;

pencilTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].style = styles[path_index];
	paths[path_index].add(e.point);

	if (path_index == 0 && typeof ts_socket !== 'undefined') mouseCatch(e, 'pencilTool');
};

pencilTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index].add(e.point);
	paths[path_index].smooth();

	if (path_index == 0 && typeof ts_socket !== 'undefined') mouseCatch(e, 'pencilTool');
};
