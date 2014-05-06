var eraseTool = new Tool();
eraseTool.minDistance = 10;

eraseTool.onMouseDown = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index] = new Path();
	paths[path_index].originalColor = styles[path_index].strokeColor;
	styles[path_index].strokeColor = '#fff';
	paths[path_index].style = styles[path_index];
	paths[path_index].add(e.point);
};

eraseTool.onMouseDrag = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;

	paths[path_index].add(e.point);
	paths[path_index].smooth();
};

eraseTool.onMouseUp = function (e, path_index) {
	path_index = typeof path_index !== 'undefined' ? path_index : 0;
	
	paths[path_index].add(e.point);
	paths[path_index].smooth();
	styles[path_index].strokeColor = paths[path_index].originalColor;
}
