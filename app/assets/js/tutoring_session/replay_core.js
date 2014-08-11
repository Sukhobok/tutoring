console.log('test');
var Player = (function (start_position, end_position, audio1_length, audio2_length) {
	var player = this;
	player.start_position = start_position;
	player.position = start_position;
	player.end_position = end_position;
	player.duration = player.end_position - player.start_position;
	player.looper = null;
	player.last_item = 0;

	/*
	player.audio1 = document.getElementById('audio1');
	player.audio1_length = audio1_length;
	player.audio1_start = player.end_position - player.audio1_length;
	player.audio2 = document.getElementById('audio2');
	player.audio2_length = audio2_length;
	player.audio2_start = player.end_position - player.audio2_length;
	*/

	player.play = function() {
		player.looper = setInterval(function() {
			for(i = player.position; i < player.position + 100; i++) {
				/*
				if(i < player.audio1_start) if(!player.audio1.paused) player.audio1.load();
				if(i < player.audio2_start) if(!player.audio2.paused) player.audio2.load();

				if(i >= player.audio1_start) if(player.audio1.paused) player.audio1.play();
				if(i >= player.audio2_start) if(player.audio2.paused) player.audio2.play();
				*/

				while (player.last_item != _data.length - 1 && _data[player.last_item].t <= i)
				{
					if (_data[player.last_item].t == i)
					{
						var _current = JSON.parse(_data[player.last_item].d);
						console.log(_current);
						if (typeof _current === 'object')
						{
							switch (_current.what)
							{
								case 'draw':
									_current.e.point = new Point(_current.e.point[1], _current.e.point[2]);
									switch (_current.tool)
									{
										case 'pencil':
											switch (_current.ev)
											{
												case 'mousedrag': pencilTool.onMouseDrag(_current.e, 1); break;
												case 'mousedown': pencilTool.onMouseDown(_current.e, 1); break;
												case 'mouseup': pencilTool.onMouseUp(_current.e, 1); break;
											}
										break;

										case 'erase':
											switch (_current.ev)
											{
												case 'mousedrag': eraseTool.onMouseDrag(_current.e, 1); break;
												case 'mousedown': eraseTool.onMouseDown(_current.e, 1); break;
												case 'mouseup': eraseTool.onMouseUp(_current.e, 1); break;
											}
										break;

										case 'rectangle':
											switch (_current.ev)
											{
												case 'mousedrag': rectangleTool.onMouseDrag(_current.e, 1); break;
												case 'mousedown': rectangleTool.onMouseDown(_current.e, 1); break;
												case 'mouseup': rectangleTool.onMouseUp(_current.e, 1); break;
											}
										break;

										case 'ellipse':
											switch (_current.ev)
											{
												case 'mousedrag': ellipseTool.onMouseDrag(_current.e, 1); break;
												case 'mousedown': ellipseTool.onMouseDown(_current.e, 1); break;
												case 'mouseup': ellipseTool.onMouseUp(_current.e, 1); break;
											}
										break;

										default:
											switch (_current.ev)
											{
												case 'mousedrag': lineTool.onMouseDrag(_current.e, 1); break;
												case 'mousedown': lineTool.onMouseDown(_current.e, 1); break;
												case 'mouseup': lineTool.onMouseUp(_current.e, 1); break;
											}
									}

									project.view.update();
								break;

								case 'wb_style':
									switch (_current.type)
									{
										case 'color':
											styles[1].strokeColor = _current.value;
										break;

										case 'size':
											styles[1].strokeWidth = _current.value;
										break;
									}
								break;

								case 'chat':
									tsChatAdd(_current.message);
								break;

								case 'mode':
									tsSelectMode(_current.mode);
								break;

								case 'wb_tabs':
									switch (_current.action)
									{
										case 'add':
											// tsAddTab();
										break;

										case 'remove':
											// tsRemoveTab();
										break;

										case 'focus':
											// tsFocusTab(_current.tab_id);
										break;
									}
								break;

								case 'wb_actions':
									switch (_current.action)
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
									switch (_current.action)
									{
										case 'change_language':
											tsCodingChangeLang(_current.value);
										break;

										case 'change_template':
											tsCodingChangeTemplate(_current.value);
										break;

										case 'action':
											tsCodingAction(_current.value);
										break;

										case 'data':
											tsCodingEditor.setValue(_current.value.code_data);
											tsCodingEditor.gotoLine(_current.value.cursor_at.row + 1, _current.value.cursor_at.column);
										break;
									}
								break;

								case 'text':
									tsTextReceive(_current.value);
								break;
							}
						}
					}

					player.last_item++;
				}
			}

			player.position += 100;
			if(player.position >= player.end_position) player.stop();
		}, 100);
	};

	player.pause = function() {
		clearInterval(player.looper);
		
		/*
		if(!player.audio1.paused) player.audio1.pause();
		if(!player.audio2.paused) player.audio2.pause();
		*/
	};

	player.stop = function() {
		clearInterval(player.looper);
		player.position = player.start_position;
		// reset_replayer();
		
		/*
		if(!player.audio1.paused) { player.audio1.load(); }
		if(!player.audio2.paused) { player.audio2.load(); }
		*/
	};
});

var p = new Player(_started_at, _ended_at, 1, 1);
// p.play();

$('#ss-action-play').click(function() {
	if(this.innerHTML == 'll') {
		this.innerHTML = '&#9658;';
		p.pause();
		$('#action_stop_whiteboard').hide();
	} else {
		this.innerHTML = 'll';
		p.play();
		$('#action_stop_whiteboard').show();
	}
});

$('#ss-action-stop').click(function() {
	p.stop();
	$('#ss-action-stop').hide();
	$('#ss-action-play').html('&#9658;');
});
