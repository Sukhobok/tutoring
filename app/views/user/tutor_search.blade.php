<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@if (Auth::check())
				@include('templates.left_sidebar')
			@else
				&nbsp;
			@endif

		</div>

		<div class="layout-main-ext">
			<div class="ss-search-name">
				<span class="ss-search-title">ALREADY KNOW SOMEONE?</span>
				<input type="text" placeholder="Enter his/her name" class="ss-search" />
			</div>

			<div class="ss-search-filters">
				<div class="ss-search-filters-in">
					<div class="ss-search-left">
						<span class="ss-search-title">SEARCH BY SUBJECT AND FILTERS</span>
						<br />
						<br />
						<div class="ss-search-price" style="font-weight: 700; margin-bottom: 4px;">
							Maximum price/hour:
							<span id="ss-search-amount" style="color: #81b201;"></span>
						</div>
						<div id="ss-search-slider"></div>
					</div>

					<div class="ss-search-right">
						<input type="checkbox" name="ss-search-available-now" class="ss-search-available-now" value="1" /> Available Now
					</div>
					<div class="clear"></div>
				</div>

				<div class="ss-search-main-subjects">
					@foreach ($main_subjects as $i => $main_subject)
						<div class="ss-search-main-subject {{ ($i == 0) ? 'is-selected' : '' }}" data-ss-msid="{{{ $main_subject->id }}}">
							{{{ $main_subject->name }}}
						</div>
					@endforeach
				</div>

				<div class="ss-search-filters-in">
					@foreach ($main_subjects as $i => $main_subject)
						<div class="ss-search-subjects {{ ($i != 0) ? 'hide' : '' }}" data-ss-msid="{{{ $main_subject->id }}}">
							@foreach ($subjects[$main_subject->id] as $subject)
								<div class="ss-search-subject">
									<input type="checkbox" data-ss-sid="{{{ $subject->id }}}" /> {{{ $subject->name }}}
								</div>
							@endforeach
						</div>
					@endforeach
				</div>
			</div>

			<div class="ss-search-result" style="display: none;">
				&nbsp;
			</div>

			<div class="ss-search-no-results">
				<p>NO TUTORS MATCHING YOU CRITERIA!</p>
				<p>PLEASE ADD MORE SUBJECTS OR SELECT A NEW PRICE RANGE!</p>
			</div>
		</div>
	</div>
</div>
