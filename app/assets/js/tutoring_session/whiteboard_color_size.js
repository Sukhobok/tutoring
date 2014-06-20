/**
 * Colors
 */
$(document).on('click', '.ts-whiteboard-tools-colors', function () {
	if($(this).width() == 36) {
		$(this).animate({
			width: 311
		});
	} else {
		$(this).animate({
			width: 36
		});
	}
});

$(document).on('click', '.ts-whiteboard-tools-color', function () {
	var _class = 'ts-whiteboard-tools-color-';
	_class += this.getAttribute('data-ts-color-name');
	var _name = this.getAttribute('data-ts-color-name');
	var _color = this.getAttribute('data-ts-color');

	var _orig_class = 'ts-whiteboard-tools-color-';
	_orig_class += $('.ts-whiteboard-tools-color').first()[0].getAttribute('data-ts-color-name');
	var _orig_name = $('.ts-whiteboard-tools-color').first()[0].getAttribute('data-ts-color-name');
	var _orig_color = $('.ts-whiteboard-tools-color').first()[0].getAttribute('data-ts-color');

	$('.ts-whiteboard-tools-color').first().removeClass(_orig_class).addClass(_class);
	$('.ts-whiteboard-tools-color').first()[0].setAttribute('data-ts-color-name', _name);
	$('.ts-whiteboard-tools-color').first()[0].setAttribute('data-ts-color', _color);

	$(this).removeClass(_class).addClass(_orig_class);
	$(this)[0].setAttribute('data-ts-color-name', _orig_name);
	$(this)[0].setAttribute('data-ts-color', _orig_color);

	styles[0].strokeColor = _color;
	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'wb_style',
			type: 'color',
			value: _color
		}
	);
});

/**
 * Sizes
 */
$(document).on('click', '.ts-whiteboard-tools-sizes', function () {
	if($(this).width() == 36) {
		$(this).animate({
			width: 233
		});
	} else {
		$(this).animate({
			width: 36
		});
	}
});

$(document).on('click', '.ts-whiteboard-tools-size', function () {
	var _size = parseInt(this.getAttribute('data-ts-size'));
	var _orig_size = parseInt($('.ts-whiteboard-tools-size').first()[0].getAttribute('data-ts-size'));

	$('.ts-whiteboard-tools-size').first()[0].setAttribute('data-ts-size', _size);
	$('.ts-whiteboard-tools-size').first().text(_size + 'px');

	this.setAttribute('data-ts-size', _orig_size);
	$(this).text(_orig_size + 'px');

	styles[0].strokeWidth = _size;
	ts_socket.emit(
		'tutoring_session_data',
		{
			what: 'wb_style',
			type: 'size',
			value: _size
		}
	);
});
