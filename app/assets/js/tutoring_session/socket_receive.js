ts_socket.on('tutoring_session_data', function (data)
{
	console.log(data);
	if (typeof data === 'object')
	{
		switch (data.what)
		{
			case 'draw':
				data.e.point = new Point(data.e.point[1], data.e.point[2]);
				switch (data.tool)
				{
					case 'pencil':
						switch (data.ev)
						{
							case 'mousedrag': pencilTool.onMouseDrag(data.e, 1); break;
							case 'mousedown': pencilTool.onMouseDown(data.e, 1); break;
							case 'mouseup': pencilTool.onMouseUp(data.e, 1); break;
						}
					break;

					case 'erase':
						switch (data.ev)
						{
							case 'mousedrag': eraseTool.onMouseDrag(data.e, 1); break;
							case 'mousedown': eraseTool.onMouseDown(data.e, 1); break;
							case 'mouseup': eraseTool.onMouseUp(data.e, 1); break;
						}
					break;

					case 'rectangle':
						switch (data.ev)
						{
							case 'mousedrag': rectangleTool.onMouseDrag(data.e, 1); break;
							case 'mousedown': rectangleTool.onMouseDown(data.e, 1); break;
							case 'mouseup': rectangleTool.onMouseUp(data.e, 1); break;
						}
					break;

					case 'ellipse':
						switch (data.ev)
						{
							case 'mousedrag': ellipseTool.onMouseDrag(data.e, 1); break;
							case 'mousedown': ellipseTool.onMouseDown(data.e, 1); break;
							case 'mouseup': ellipseTool.onMouseUp(data.e, 1); break;
						}
					break;

					default:
						switch (data.ev)
						{
							case 'mousedrag': lineTool.onMouseDrag(data.e, 1); break;
							case 'mousedown': lineTool.onMouseDown(data.e, 1); break;
							case 'mouseup': lineTool.onMouseUp(data.e, 1); break;
						}
				}

				project.view.update();
			break;

			case 'wb_style':
				switch (data.type)
				{
					case 'color':
						styles[1].strokeColor = data.value;
					break;

					case 'size':
						styles[1].strokeWidth = data.value;
					break;
				}
			break;

			case 'chat':
				tsChatAdd(data.message, 1);
			break;

			case 'mode':
				tsSelectMode(data.mode);
			break;

			case 'wb_tabs':
				switch (data.action)
				{
					case 'add':
						tsAddTab();
					break;

					case 'remove':
						tsRemoveTab();
					break;

					case 'focus':
						tsFocusTab(data.tab_id);
					break;
				}
			break;

			case 'wb_actions':
				switch (data.action)
				{
					case 'undo':
						tsUndo();
					break;

					case 'redo':
						tsRedo();
					break;

					case 'clear':
						tsClear();
					break;
				}
			break;

			case 'coding':
				switch (data.action)
				{
					case 'change_language':
						tsCodingChangeLang(data.value);
					break;

					case 'change_template':
						tsCodingChangeTemplate(data.value);
					break;

					case 'action':
						tsCodingAction(data.value);
					break;

					case 'data':
						tsCodingEditor.setValue(data.value.code_data);
						tsCodingEditor.gotoLine(data.value.cursor_at.row + 1, data.value.cursor_at.column);
					break;
				}
			break;

			case 'text':
				tsTextReceive(data.value);
			break;
		}
	}
});
