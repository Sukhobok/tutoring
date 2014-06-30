<div class="content">
	<div class="layout">
		<div class="layout-sidebar">
			@include('templates.settings_left_sidebar', array('selected' => 'Invite Friends'))
		</div>

		<div class="layout-main page-settings">
			<div class="ss-container">
				<div class="ss-section">
					<h1>Invite Friends</h1>

					<div class="page-settings-inner">
						<p>
							Share StudySquare with your friends. Knowledge is power and we want everyone to be apart of StudySquare.
						</p>

						<p style="color: #000; margin-top: 15px;">
							Get started by invite-ing your school friends. You can add “,” to separte multiple email addresses.
						</p>

						<table class="ss-invite">
							<tr>
								<td>
									Email:
								</td>
								<td>
									<textarea></textarea>
								</td>
							</tr>
						</table>

						<button class="ss-button green bold" style="margin: 0 auto;">Invite</button>

					</div>
				</div>

				<div class="ss-section">
					<h1>Invite your friends from popular websites</h1>

					<div class="page-settings-inner">
						<div class="fb-like" data-href="http://studysquare.com/" data-send="true" data-layout="box_count" data-width="450" data-show-faces="false" data-action="recommend"></div>
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://studysquare.com/" data-text="StudySquare" data-size="large">Tweet</a>
						<script type="IN/Share" data-url="http://studysquare.com/" data-counter="top"></script>

						<script>(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="//connect.facebook.net/en_US/all.js#xfbml=1&appId=169327216579166";i.parentNode.insertBefore(r,i)})(document,"script","facebook-jssdk");!function(e,t,n){var r,i=e.getElementsByTagName(t)[0],s=/^http:/.test(e.location)?"http":"https";if(!e.getElementById(n)){r=e.createElement(t);r.id=n;r.src=s+"://platform.twitter.com/widgets.js";i.parentNode.insertBefore(r,i)}}(document,"script","twitter-wjs")</script>
						<script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
					</div>
				</div>
			</div>
		</div>

		<div class="layout-sidebar layout-sidebar-right">
			@include('templates.right_sidebar')
		</div>
	</div>
</div>
