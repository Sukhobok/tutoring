var ss_get_search_results = function ()
{
	var _price = $('#ss-search-slider').slider('value');
	var _name = $('.ss-search-name .ss-search').val();
	var _subjects = [];

	$('.ss-search-subject input[type="checkbox"]:checked').each(function ()
	{
		_subjects.push(this.getAttribute('data-ss-sid'));
	});

	_subjects = _subjects.join(',');
	var _available = $('.ss-search-available-now');
	
	if (_available.is(':checked'))
	{
		_available = 1;
	}
	else
	{
		_available = 0;
	}

	$.ajax({
		type: 'POST',
		url: '/ajax/tutor/search',
		data:
		{
			'price': _price,
			'name': _name,
			'subjects': _subjects,
			'available': _available
		}
	}).done(function (data)
	{
		if (data === '')
		{
			$('.ss-search-result').hide();
			$('.ss-search-no-results').show();
		}
		else
		{
			$('.ss-search-result').html(data);
			$('.ss-search-result').show();
			$('.ss-search-no-results').hide();
		}
	});
}

/**
 * On name change
 */
$('.ss-search-name .ss-search').on('change', function ()
{
	ss_get_search_results();
});

/**
 * On slider change (price)
 */
$('#ss-search-slider').slider(
{
	value: 100,
	min: 20,
	max: 100,
	slide: function (event, ui)
	{
		$('#ss-search-amount').html('$' + ui.value);
	},
	stop: function (event, ui)
	{
		$('#ss-search-amount').html('$' + ui.value);
		ss_get_search_results();
	}
});

$('#ss-search-amount').html("$" + $('#ss-search-slider').slider('value'));

/**
 * On change main subject
 */
$(document).on('click', '.ss-search-main-subject', function ()
{
	var _id = this.getAttribute('data-ss-msid');
	$('.ss-search-main-subject').removeClass('is-selected');
	$(this).addClass('is-selected');

	$('.ss-search-subjects').addClass('hide');
	$('.ss-search-subjects[data-ss-msid="' + _id + '"]').removeClass('hide');
});

/**
 * On subject check
 */
$('.ss-search-subject input[type="checkbox"]').on('change', function ()
{
	ss_get_search_results();
});

/**
 * On Available Now check
 */
$('.ss-search-available-now').on('change', function ()
{
	ss_get_search_results();
});
