var sourcevid = document.getElementById('webrtc-source');
var remotevid = document.getElementById('webrtc-remote');
var localStream = null;
var peerConn = null;
var mediaConstraints = {
	'mandatory': {
		'OfferToReceiveAudio': true,
		'OfferToReceiveVideo': true
	}
};
var _recordRTC = null;

function startVideo() {
	if(localStream)
		return true;

	navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || window.navigator.mozGetUserMedia || navigator.msGetUserMedia;
	window.URL = window.URL || window.webkitURL;
	window.AudioContext = window.AudioContext || window.webkitAudioContext;

	navigator.getUserMedia({
		video: true,
		audio: true
	}, function (stream) {
		localStream = stream;
		_recordRTC = RecordRTC(localStream);
		_recordRTC.startRecording();

		if (sourcevid.mozSrcObject) {
			sourcevid.mozSrcObject = localStream;
			sourcevid.play();
			connect();
		} else {
			sourcevid.src = window.URL.createObjectURL(localStream);
			sourcevid.muted = true;
			sourcevid.play();
			connect();
		}
	}, function (error) {
		console.log('Error code [' + error.code + ']');
		return;
	});
}

function toggleVideo() {
	localStream.getVideoTracks()[0].enabled = !localStream.getVideoTracks()[0].enabled;
}

function toggleAudio() {
	localStream.getAudioTracks()[0].enabled = !localStream.getAudioTracks()[0].enabled;
}

function connect() {
	createPeerConnection();
	
	peerConn.createOffer(function (sessionDescription) {
		peerConn.setLocalDescription(sessionDescription);
		ts_socket.json.send(sessionDescription);
	}, function () {
		console.log('Create offer failed');
	}, mediaConstraints);
}

function stop() {
	peerConn.close();
	peerConn = null;
}

ts_socket.on('message', function (evt) {
	if (evt.type === 'offer') {
		createPeerConnection();
		peerConn.setRemoteDescription(new RTCSessionDescription(evt));
		
		peerConn.createAnswer(function (sessionDescription) {
			peerConn.setLocalDescription(sessionDescription);
			ts_socket.json.send(sessionDescription);
		}, function () {
			console.log('Create answer failed');
		}, mediaConstraints);
	} else if (evt.type === 'answer') {
		peerConn.setRemoteDescription(new RTCSessionDescription(evt));
	} else if (evt.type === 'candidate') {
		var candidate = new RTCIceCandidate({
			sdpMLineIndex: evt.sdpMLineIndex,
			sdpMid: evt.sdpMid,
			candidate: evt.candidate
		});
		
		peerConn.addIceCandidate(candidate);
	}
});

function createPeerConnection() {
	console.log("Creating peer connection");
	var RTCPeerConnection = webkitRTCPeerConnection || mozRTCPeerConnection;
	
	peerConn = new RTCPeerConnection({
		iceServers: [{
			url: 'stun:stun.l.google.com:19302' // !mozilla ? 'stun:stun.l.google.com:19302' : 'stun:23.21.150.121'
		}]
	});

	if(localStream) peerConn.addStream(localStream);

	peerConn.onicecandidate = function (evt) {
		if (event.candidate) {
			ts_socket.json.send({
				type: "candidate",
				sdpMLineIndex: evt.candidate.sdpMLineIndex,
				sdpMid: evt.candidate.sdpMid,
				candidate: evt.candidate.candidate
			});
		}
	};

	peerConn.addEventListener('addstream', function (event) {
		remotevid.src = window.URL.createObjectURL(event.stream);
		remotevid.play();
	}, false);

	peerConn.addEventListener('removestream', function (event) {
		remotevid.src = '';
	}, false);
}

function xhr(url, data, callback) {
	var request = new XMLHttpRequest();
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			callback(location.href + request.responseText);
		}
	};
	request.open('POST', url);
	request.send(data);
}

function end_audio_recording() {
	if(_recordRTC) {
		_recordRTC.stopRecording(function (audio) {
			var formData = new FormData();
			formData.append('audio-filename', 'recording.wav');
			formData.append('audio-blob', _recordRTC.getBlob());
			_recordRTC.startRecording();
			xhr('/ajax/session/receive_audio', formData, function (data) { });
		});
	}
}

setInterval(function () {
	if(!session_finished) end_audio_recording();
}, 60000);

$('.ts-cam-toggle').change(function() { toggleVideo(); });
$('.ts-mic-toggle').change(function() { toggleAudio(); });
