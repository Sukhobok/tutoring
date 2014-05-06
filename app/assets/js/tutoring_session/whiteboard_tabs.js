/**
 * Add tab
 */
var tsAddTab = function () {
	var _last_tab = parseInt($('.ts-whiteboard-tab').last()[0].getAttribute('data-ts-tab-id'));

	if(_last_tab < 6) {
		$('.ts-whiteboard-tab').removeClass('is-selected');
		var _tab = $('.ts-whiteboard-tab').first().clone();

		_tab.text('Tab ' + (_last_tab + 2));
		_tab[0].setAttribute('data-ts-tab-id', _last_tab + 1);
		_tab.addClass('is-selected');

		$('.ts-whiteboard-tabs-holder').append(_tab);
		project.layers[_last_tab + 1] = new Layer();
		project.layers[_last_tab + 1].redoChildren = [];
		
		activateLayer(_last_tab + 1);
	}
};

/**
 * Remove last tab
 */
var tsRemoveTab = function () {
	var _last_tab = parseInt($('.ts-whiteboard-tab').last()[0].getAttribute('data-ts-tab-id'));

	if(_last_tab !== 0) {
		if($('.ts-whiteboard-tab').last().hasClass('is-selected')) {
			$('.ts-whiteboard-tab').eq(-2).addClass('is-selected');
			activateLayer(_last_tab - 1);
		}

		$('.ts-whiteboard-tab').last().remove();
		project.layers[_last_tab].remove();
	}
}

/**
 * Focus a tab
 */
var tsFocusTab = function (index) {
	$('.ts-whiteboard-tab').removeClass('is-selected');
	$('.ts-whiteboard-tab[data-ts-tab-id="' + index + '"]').addClass('is-selected');
	activateLayer(index);
}

var activateLayer = function (index) {
	for(i = 0; i < project.layers.length; i++) {
		project.layers[i].visible = false;
	}

	project.layers[index].visible = true;
	project.layers[index].activate();
	project.view.update();
}

$(document).on('click', '#ts-whiteboard-tab-add', function () { tsAddTab(); });
$(document).on('click', '.ts-whiteboard-tools-remove-tab', function () { tsRemoveTab(); });
$(document).on('click', '.ts-whiteboard-tab', function () { tsFocusTab(this.getAttribute('data-ts-tab-id')); });
