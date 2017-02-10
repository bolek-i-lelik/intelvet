var localStream = null;
var streamConstraints = { "audio": true, "video": false};//запрашиваем разрешение на использование микрофона и камеры

function getUserMedia_success(stream){
	console.log("getUserMedia_success():", stream);
	localVideo1.src = URL.createObjectURL(stream);
	localStream = stream;
}

function getUserMedia_error(error){
	console.log("getUserMedia_error():", error);
}

function getUserMedia_click(){
	console.log("getUserMedia_click()");
	navigator.webkitGetUserMedia(
		streamConstraints,
		getUserMedia_success,
		getUserMedia_error
	);
}

var pc1;
var pc2;
var servers = null;
var offerConstraints = {};

function pc1_createOffer_success(desc){
	console.log("pc1_createOffer_success(): \ndesc.sdp: \n" + desc.sdp + "desc:", desc);
	pc1.setLocalDescription(desc);
	var data = [];
	data['type'] = 'offer';
	data['desc'] = desc;	
	data = JSON.stringify(data);
	socket.send(data);//pc2_receivedOffer(desc);
}

function pc1_createOffer_error(error){
	console.log("pc1_createOffer_success_error(): error:", error);
}

function pc1_onicecandidate(event){
	if(event.candidate){
		console.log("pc1_onicecandidate():\n" + event.candidate.candidate.replace("\r\n", ""), event.candidate);
		/*var data = [];
		data['type'] = 'ice1';
		data['desc'] = event.candidate;*/
		data1 = {
            type: 'ice1',
        	desc: event.candidate,
            adresat: '-1',
        };
        var data = JSON.stringify(data1);
		console.log(data);
		socket.send(data);//pc2.addIceCandidate(new RTCIceCandidate(event.candidate));
	}
}

function pc1_onaddstream(event){
	console.log("pc1_onaddstream()");
	remoteVideo1.src = URL.createObjectURL(event.stream);
}

function createOffer_click(){
	console.log("createOffer_click()");
	pc1 = new webkitRTCPeerConnection(servers);
	pc1.onicecandidate = pc1_onicecandidate;
	pc1.onaddstream = pc1_onaddstream;
	pc1.addStream(localStream);
	pc1.createOffer(
		pc1_createOffer_success,
		pc1_createOffer_error,
		offerConstraints
	);
}

function pc2_createAnswer_success(desc){
	pc2.setLocalDescription(desc);
	console.log("pc2_createAnswer_success()", desc.sdp);
	var data = [];
	data['type'] = 'answer';
	data['desc'] = desc;
	data = JSON.stringify(data);
	socket.send(data);//pc1.setRemoteDescription(desc);
}

function pc2_createAnswer_error(error){
	console.log('pc2_createAnswer_error():', error);
}

var answerConstraints = {
	'mandatory': { 'OfferToReceiveAudio': true, 'OfferToReceiveVideo': false}
};

function pc2_receivedOffer(desc){
	console.log("pc2_receivedOffer():", desc);
	pc2 = new webkitRTCPeerConnection(servers);
	pc2.onicecandidate = pc2_onicecandidate;
	pc2.onaddstream = pc1_onaddstream;
	pc2.addStream(localStream);
	pc2.setRemoteDescription( new RTCSessionDescription(desc));
	pc2.createAnswer(
		pc2_createAnswer_success,
		pc2_createAnswer_error,
		answerConstraints
	);
}

function pc2_onicecandidate(event){
	if(event.candidate){
		console.log("pc2_onicecandidate():", event.candidate.candidate);
		var data = [];
		data['type'] = 'ice2';
		data['desc'] = event.candidate;
		data = JSON.stringify(data);
		socket.send(data);//pc1.addIceCandidate(new RTCIceCandidate(event.candidate));
	}
}

function pc2_onaddstream(event){
	console.log("pc2_onaddstream()");
	remoeVideo2.src = URL.createObjectURL(event.stream);
}

function btnHangupClick(){
	//Останавливаем локальное видео
	localVideo1.src = "";
	localStream.stop();
	localStream = null;
	//Останавливаем видеопотоки для каждого участника
	remoteVideo1.src = "";
	pc1.close();
	pc1 = null;
	/*remoteVideo2.src = "";
	pc2.close();
	pc2 = null;*/
	var data = [];
	data['type'] = 'hangup';
	data['desc'] = '';
	var data = JSON.stringify(data);
	socket.send(data);
}
