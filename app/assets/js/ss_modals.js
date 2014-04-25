/**
 * Try to close the modal on clicking the background or pressing escape
 */
$(document).on('click', '.ss-modal-bg', function () {
	$.ssModal({
		action: 'try_close'
	});
});

$(document).on('keyup', function (e) {
	if(e.keyCode == 27) {
		$.ssModal({
			action: 'try_close'
		});
	}
});

/**
 * $.ssModal plugin
 */
(function ($) {

	$.ssModal = function (options) {
		var settings = $.extend({
			modalId: '0',
			canBeClosed: 1,
			action: 'open',
			complete: function () {}
		}, options);

		if(settings.action === 'open') {
			// Open a modal
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
			// Force close a modal
			$('.ss-modal').fadeOut({
				duration: 1000
			});

			$('.ss-modal-bg').fadeOut({
				duration: 1000,
				complete: settings.complete
			});
		} else if(settings.action === 'try_close') {
			// Try to close a modal
			var $bg = $('.ss-modal-bg');

			if($bg.data('can_be_closed') && $bg.data('can_be_closed') == 1) {
				$.ssModal({
					action: 'close'
				});
			}
		}
	};

}(jQuery));
