{{-- Hire Now Notify modal --}}
<div class="ss-modal" id="ss-modal-hire-now-notify">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<h1>Tutoring Request</h1>
		<div id="ss-modal-hire-now-notify-person">
			<div class="profile-picture">
				{{ HTML::image('images/default_avatar.jpg', 'Profile Picture', array('width' => 100, 'height' => 100)) }}
			</div>
			<h2>Name</h2>
		</div>

		<div id="ss-modal-hire-now-notify-buttons" data-ss-request-id="0">
			<button class="ss-button green bold inline" id="ss-modal-hire-now-notify-accept">ACCEPT</button>
			<button class="ss-button red bold inline" id="ss-modal-hire-now-notify-decline">DECLINE</button>
		</div>

		<p>
			Duration requested:
			<span class="bold"><span id="ss-modal-hire-now-notify-hours">1</span> hour/s</span>
			@ $<span id="ss-modal-hire-now-notify-price">20.00</span>/hour
		</p>

		<p id="ss-modal-hire-now-notify-description">
			Description here
		</p>

		<p id="ss-modal-hire-now-notify-expire">
			The request will expire in <span class="bold">01:00</span> minutes!
		</p>
	</div>
</div>

{{-- Hire Now Send modal --}}
<div class="ss-modal" id="ss-modal-hire-now-send">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<h1>Wait</h1>
		<p>Please wait until the tutor accepts the hire request!</p>
		<p id="ss-modal-hire-now-send-expire">
			The request will expire in <span class="bold">01:00</span> minutes!
		</p>
	</div>
</div>
