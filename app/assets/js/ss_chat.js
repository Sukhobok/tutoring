$(document).on('click', '.ss-open-chat-button', function ()
{
	if ($('.ss-chat').is(':visible'))
	{
		$.pageslide.close();
	}
	else
	{
		$.pageslide({ direction: 'left', href: '#ss-chat-inner', modal: true });
		$('.ss-chat').mCustomScrollbar();
	}
});

// Cateogry Change
$('.ss-chat').on('click', '.ss-chat-category', function ()
{
	$('.ss-chat-category').removeClass('is-active');
	$(this).addClass('is-active');
	var _new_category = this.getAttribute('data-ss-chat-category');

	$('.ss-chat-category-items:visible').fadeOut(500, function ()
	{
		$('.ss-chat-category-items[data-ss-chat-category="' + _new_category + '"]').fadeIn(500, function ()
		{
			$('.ss-chat').mCustomScrollbar('update');
		});
	});
});
