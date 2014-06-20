var mouseCatch = function (e, _tool)
{
	var tool_name = '';
	switch (_tool)
	{
		case 'ellipseTool':
			tool_name = 'ellipse';
		break;

		case 'eraseTool':
			tool_name = 'erase';
		break

		case 'lineTool':
			tool_name = 'line';
		break;

		case 'pencilTool':
			tool_name = 'pencil';
		break;

		case 'rectangleTool':
			tool_name = 'rectangle';
		break;
	}

	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'draw',
			tool: tool_name,
			e: { point: e.point },
			ev: e.type
		}
	);
}
