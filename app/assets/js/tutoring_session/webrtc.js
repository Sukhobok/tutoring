var startVideo = function () {
	var webrtc = new SimpleWebRTC({
	    localVideoEl: 'webrtc-source',
	    remoteVideosEl: 'webrtc-remote',

	    // immediately ask for camera access
	    autoRequestMedia: true
	});

	webrtc.on('readyToCall', function () {
	    webrtc.joinRoom(window.global_ts_id);
	});
};
