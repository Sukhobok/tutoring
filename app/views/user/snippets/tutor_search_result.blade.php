<div class="ss-search-result"> 
	<div class="ss-search-result-left">
		<div class="profile-picture ss-link" data-ss-link="{{{ Alias::getURL('User', $user->id) }}}">
			{{ HTML::image(HTML::profile_picture($user), 'Profile Picture', array('width' => 60)) }}
		</div>
	</div>

	<div class="ss-search-result-right">
		<div class="ss-search-result-name is-featured ss-link" data-ss-link="{{{ Alias::getURL('User', $user->id) }}}"> 
			{{{ $user->name }}}
		</div>

		<div class="ss-search-result-bio">
			<div class="ss-search-result-section-title">{{{ strtoupper($user->name) }}}'S BIO</div>
			{{{ $user->bio }}}
		</div>

		<div class="ss-search-result-teaches">
			<div class="ss-search-result-section-title">TUTORS</div>
			<ul>
				@foreach ($user->subjects as $subject)
					<li>{{{ $subject }}}</li>
				@endforeach
			</ul>
		</div>

		<div class="ss-search-result-other">
			<div class="ss-search-result-rating">
				<div class="ss-search-result-section-title">RATING</div>
				asd
			</div>

			<div class="ss-search-result-price">
				<div class="ss-search-result-section-title">HOURLY RATE</div>
				${{{ $user->price }}}/HOUR
			</div>

			<div class="ss-search-result-reviews">
				<div class="ss-search-result-section-title">REVIEWS (3)</div>
				asd
			</div>
			<div class="clear"></div>
		</div>

		<div class="ss-search-result-hire">
			<button class="ss-button green bold ss-link" data-ss-link="{{{ Alias::getURL('User', $user->id) }}}">
				HIRE {{{ strtoupper($user->name) }}}
			</button>
		</div>
	</div>

	<div class="clear"></div>
</div>
