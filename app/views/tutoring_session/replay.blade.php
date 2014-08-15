<div class="content">
	<div class="layout page-tutoring-session">
		<div class="layout-main-ext">
			<div class="ts-top">
				{{-- Top left buttons --}}
				<div class="ts-mode-tools-top" data-ts-mode="whiteboard">
					<div class="ts-button-unfilled ts-mode-tool-top" id="ss-action-play" style="line-height: 35px;">
						&#9658;
					</div>

					<div class="ts-button-unfilled ts-mode-tool-top" id="ss-action-stop" style="line-height: 35px;">
						&bull;
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
				<div class="clear"></div>
			</div>

			<div class="ss-container">
				{{ HTML::image(HTML::profile_picture($_ts[0]->student), 'Profile Picture', array('width' => 220)) }}
			</div>

			<div class="ts-video-buttons">
				<button class="ss-button blue bold">GO BACK</button>
			</div>

			<div class="ss-container">
				{{ HTML::image(HTML::profile_picture($_ts[0]->tutor), 'Profile Picture', array('width' => 220)) }}
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
				<div class="ts-chat-messages" style="height: 150px;"></div>
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
					<div class="ts-file-manager-file snippet-ts-file-manager-file hide">
						<div class="ts-file-manager-file-actions" data-ss-file="">
							<div class="ts-file-manager-file-action" data-ss-action="remove">
								{{ HTML::image('images/tutoring_session/file_actions/remove_icon.png', 'Remove') }}
								Remove
							</div>

							<div class="ts-file-manager-file-action" data-ss-action="download">
								{{ HTML::image('images/tutoring_session/file_actions/download_icon.png', 'Download') }}
								Download
							</div>

							<div class="ts-file-manager-file-action" data-ss-action="download">
								{{ HTML::image('images/tutoring_session/file_actions/load_icon.png', 'Load') }}
								Load
							</div>
						</div>

						<div class="ts-file-manager-file-caption" title="">
							File
						</div>

						{{ HTML::image('images/tutoring_session/file_icons/ppt_icon.png', '', array('class' => 'ts-file-manager-file-icon')) }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var _data = {{ $_data }};
	var _started_at = {{{ $_ts[0]->started_at->getTimestamp()*1000 }}};
	var _ended_at = {{{ $_ts[0]->ended_at->getTimestamp()*1000 }}};
	var partner_name = '{{{ $_ts[0]->tutor->name }}}';
	var current_name = '{{{ $_ts[0]->student->name }}}';
</script>
