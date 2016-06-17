var webrtc = null;
var audio_mute = false;
var video_pause = false;

var startVideo = function () {
	webrtc = new SimpleWebRTC({
	    localVideoEl: 'webrtc-source',
	    remoteVideosEl: 'webrtc-remote',
	    autoRequestMedia: true
	});

	webrtc.on('readyToCall', function () {
	    webrtc.joinRoom(window.global_ts_id);
	});

	function toggleVideo() {
		video_pause ? webrtc.resumeVideo() : webrtc.pauseVideo();
		video_pause = !video_pause;
	}

	function toggleAudio() {
		audio_mute ? webrtc.unmute() : webrtc.mute();
		audio_mute = !audio_mute;
	}

	$('.ts-cam-toggle').change(function() { toggleVideo(); });
	$('.ts-mic-toggle').change(function() { toggleAudio(); });
};
