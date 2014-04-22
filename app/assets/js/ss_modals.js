$(document).on('click', '.ss-modal-bg', function () {
	var that = this;

	if($(that).data('can_be_closed') && $(that).data('can_be_closed') == 1) {
		$.ssModal({
			action: 'close'
		});
	}
});

(function ($) {

	$.ssModal = function (options) {
		var settings = $.extend({
			modalId: '0',
			canBeClosed: 1,
			action: 'open',
			complete: function () {}
		}, options);

		if(settings.action === 'open') {
			$.ssModal({
				action: 'close',
				complete: function () {
					$('#ss-modal-' + settings.modalId).fadeIn({
						duration: 1000
					});

					$('.ss-modal-bg').data('can_be_closed', settings.canBeClosed).fadeIn({
						duration: 1000,
						complete: settings.complete
					});
				}
			});
		} else if(settings.action === 'close') {
			$('.ss-modal').fadeOut({
				duration: 1000
			});

			$('.ss-modal-bg').fadeOut({
				duration: 1000,
				complete: settings.complete
			});
		}
	};

}(jQuery));
