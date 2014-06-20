<div class="content">
	<div class="layout page-tutoring-session">
		<div class="layout-main-ext">
			<div class="ts-top">
				{{-- Top left buttons --}}
				<div class="ts-mode-tools-top" data-ts-mode="whiteboard">
					<div class="ts-button-unfilled ts-mode-tool-top ts-whiteboard-undo">
						{{ HTML::image('images/tutoring_session/buttons_unfilled/remove.png', 'Undo') }}
					</div>

					<div class="ts-button-unfilled ts-mode-tool-top ts-whiteboard-clear">
						{{ HTML::image('images/tutoring_session/buttons_unfilled/remove.png', 'Clear') }}
					</div>

					<div class="ts-button-unfilled ts-mode-tool-top ts-whiteboard-redo">
						{{ HTML::image('images/tutoring_session/buttons_unfilled/remove.png', 'Redo') }}
					</div>
				</div>

				<div class="ts-mode-tools-top hide" data-ts-mode="text"></div>
				<div class="ts-mode-tools-top hide" data-ts-mode="coding"></div>

				{{-- Top right buttons (select mode) --}}
				<div class="ts-modes-select">
					<div class="ts-button-unfilled ts-mode-select is-selected" data-ts-mode-select="whiteboard">
						{{ HTML::image('images/tutoring_session/buttons_unfilled/modes/whiteboard.png', 'Whiteboard') }}
					</div>

					<div class="ts-button-unfilled ts-mode-select" data-ts-mode-select="text">
						{{ HTML::image('images/tutoring_session/buttons_unfilled/modes/text_processor.png', 'Text Processor') }}
					</div>

					<div class="ts-button-unfilled ts-mode-select" data-ts-mode-select="coding">
						{{ HTML::image('images/tutoring_session/buttons_unfilled/modes/coding.png', 'Coding') }}
					</div>
				</div>

				<div class="clear"></div>
			</div>

			<div class="ts-main">
				<div class="ts-modes ts-mode-whiteboard" data-ts-mode="whiteboard">
					<div class="ts-whiteboard-holder">
						<div class="ts-whiteboard-tools">
							<div class="ts-whiteboard-tool ts-whiteboard-tools-pencil is-selected" title="Draw anything with the pencil tool"></div>
							<div class="ts-whiteboard-tool ts-whiteboard-tools-erase" title="Erase something from the whiteboard"></div>
							<div class="ts-whiteboard-tool ts-whiteboard-tools-rectangle" title="Draw rectangles"></div>
							<div class="ts-whiteboard-tool ts-whiteboard-tools-ellipse" title="Draw ellipses"></div>
							<div class="ts-whiteboard-tool ts-whiteboard-tools-line" title="Draw lines"></div>

							<div class="ts-whiteboard-tool ts-whiteboard-tools-change-color">
								<div class="ts-whiteboard-tools-colors" title="Select your tool color">
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-red" data-ts-color="#ed1c24" data-ts-color-name="red"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-yellow" data-ts-color="#fff200" data-ts-color-name="yellow"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-green" data-ts-color="#00a651" data-ts-color-name="green"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-blue" data-ts-color="#00aeef" data-ts-color-name="blue"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-purple" data-ts-color="#2e3192" data-ts-color-name="purple"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-pink" data-ts-color="#ec008c" data-ts-color-name="pink"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-gray" data-ts-color="#898989" data-ts-color-name="gray"></div>
									<div class="ts-whiteboard-tools-color ts-whiteboard-tools-color-black" data-ts-color="#000" data-ts-color-name="black"></div>
								</div>
							</div>

							<div class="ts-whiteboard-tool ts-whiteboard-tools-change-size">
								<div class="ts-whiteboard-tools-sizes" title="Select your tool size">
									<div class="ts-whiteboard-tools-size" data-ts-size="2">2px</div>
									<div class="ts-whiteboard-tools-size" data-ts-size="4">4px</div>
									<div class="ts-whiteboard-tools-size" data-ts-size="8">8px</div>
									<div class="ts-whiteboard-tools-size" data-ts-size="12">12px</div>
									<div class="ts-whiteboard-tools-size" data-ts-size="16">16px</div>
									<div class="ts-whiteboard-tools-size" data-ts-size="20">20px</div>
								</div>
							</div>

							<div class="ts-whiteboard-tool ts-whiteboard-tools-remove-tab" title="Remove the last tab">
								<div class="ts-button-unfilled">
									{{ HTML::image('images/tutoring_session/buttons_unfilled/remove.png', 'Remove tab') }}
								</div>
							</div>
						</div>

						<div class="ts-whiteboard-canvas">
							<canvas id="ts-canvas"></canvas>
						</div>
						<div class="clear"></div>
					</div>

					<div class="ts-whiteboard-tabs">
						<div class="ts-whiteboard-tabs-holder">
							<div class="ts-whiteboard-tab is-selected" data-ts-tab-id="0">Tab 1</div>
						</div>

						<div id="ts-whiteboard-tab-add">+</div>
					</div>
				</div>

				<div class="ts-modes ts-mode-text hide" data-ts-mode="text">
					<textarea id="ts-text-textarea"></textarea>
				</div>

				<div class="ts-modes ts-mode-coding hide" data-ts-mode="coding">
					<div class="ts-coding-holder">
						<div class="ts-coding-sidebar">
							<div class="ts-coding-sidebar-category">Lang.</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="javascript">JS</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="html">HTML</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="css">CSS</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="php">PHP</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="c_cpp">C/C++</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="csharp">C#</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="java">Java</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="perl">Perl</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="python">Python</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang" data-ts-coding-lang="xml">XML</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-lang is-selected" data-ts-coding-lang="text">Text</div>
							<div class="ts-coding-sidebar-category">Template</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-template is-selected" data-ts-coding-template="monokai">Monokai</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-template" data-ts-coding-template="textmate">TextMate</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-template" data-ts-coding-template="tomorrow">Tomorrow</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-template" data-ts-coding-template="github">GitHub</div>
							<div class="ts-coding-sidebar-category">Actions</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-action" data-ts-coding-action="undo">Undo</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-action" data-ts-coding-action="redo">Redo</div>
							<div class="ts-coding-sidebar-item ts-coding-sidebar-action" data-ts-coding-action="save">Save</div>
						</div>

						<pre id="ts-coding-editor"></pre>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="layout-sidebar layout-sidebar-right">
			<div class="ts-top">
				<div class="ts-cam-toggle">
					<div class="onoffswitch" title="Toggle your webcam on/off">
						<input type="checkbox" name="ts-cam-toggle-cb" class="onoffswitch-checkbox" id="ts-cam-toggle-cb" checked>
						<label class="onoffswitch-label" for="ts-cam-toggle-cb">
							<div class="onoffswitch-inner"></div>
							<div class="onoffswitch-switch"></div>
						</label>
					</div>

					{{ HTML::image('images/tutoring_session/cam_icon.png', 'Webcam') }}
				</div>

				<div class="ts-mic-toggle">
					<div class="onoffswitch" title="Toggle your microphone on/off">
						<input type="checkbox" name="ts-mic-toggle-cb" class="onoffswitch-checkbox" id="ts-mic-toggle-cb" checked>
						<label class="onoffswitch-label" for="ts-mic-toggle-cb">
							<div class="onoffswitch-inner"></div>
							<div class="onoffswitch-switch"></div>
						</label>
					</div>

					{{ HTML::image('images/tutoring_session/mic_icon.png', 'Microphone') }}
				</div>

				<div class="clear"></div>
			</div>

			<div class="ss-container">
				<video id="webrtc-source"></video>
			</div>

			<div class="ts-video-buttons">
				<button class="ss-button blue bold">TAKE A SCREENSHOT</button>
				@if ($role == 'student')
					<button class="ss-button blue bold">CLOSE THE SESSION</button>
				@else
					<button class="ss-button blue bold" style="visibility: hidden;">CLOSE THE SESSION</button>
				@endif
			</div>

			<div class="ss-container">
				<video id="webrtc-remote"></video>
			</div>
		</div>
	</div>

	<div class="layout-ts-bot">
		<div class="ts-chat ts-module">
			<div class="ts-module-container">
				<div class="ts-module-toolbar">
					<div class="ts-module-title">
						Chat
					</div>
				</div>
				<div class="ts-chat-messages"></div>
				<textarea class="ts-chat-textarea"></textarea>
			</div>

			<div class="ts-chat-bot">
				<button class="ss-button blue bold ts-chat-send">SEND MESSAGE</button>

				<div class="ts-chat-pressing-enter">
					{{ Form::checkbox('ts-chat-pressing-enter-cb', '1', true, array('id' => 'ts-chat-pressing-enter-cb')) }}
					Send by pressing enter
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="ts-file-manager ts-module">
			<div class="ts-module-container">
				<div class="ts-module-toolbar">
					<div class="ts-module-title">
						File manager (<span class="ts-file-manager-count">0</span> files)
					</div>
				</div>

				<div class="ts-file-manager-files">
					@for ($i = 1; $i <= 10; $i++)
						<div class="ts-file-manager-file">
							<div class="ts-file-manager-file-actions">
								<div class="ts-file-manager-file-action">
									{{ HTML::image('images/tutoring_session/file_actions/remove_icon.png', 'Remove') }}
									Remove
								</div>

								<div class="ts-file-manager-file-action">
									{{ HTML::image('images/tutoring_session/file_actions/download_icon.png', 'Download') }}
									Download
								</div>

								<div class="ts-file-manager-file-action">
									{{ HTML::image('images/tutoring_session/file_actions/load_icon.png', 'Load') }}
									Load
								</div>
							</div>

							<div class="ts-file-manager-file-caption">
								File #{{ $i }}
							</div>

							{{ HTML::image('images/tutoring_session/file_icons/ppt_icon.png', 'ppt') }}
						</div>
					@endfor
				</div>
			</div>

			<div class="ts-file-manager-bot">
				<button class="ss-button blue bold">BROWSE</button>
			</div>
		</div>
	</div>
</div>

<div class="ss-modal" id="ss-modal-ts-started">
	<div class="ss-modal-top ss-modal-type-exclam"></div>
	<div class="ss-modal-body">
		<p>
			The tutoring session has started! Please allow camera/microphone access!
		</p>

		<p style="margin-top: 25px;">
			<button class="ss-button blue bold ss-modal-close" style="margin: 0 auto;">Got it!</button>
		</p>
	</div>
</div>
