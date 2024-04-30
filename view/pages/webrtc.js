// webrtc.js

// Function to start the video call
function startVideoCall() {
    // Get access to the user's camera and microphone
    navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        .then(function(stream) {
            // Display the local video stream
            var localVideo = document.getElementById('localVideo');
            localVideo.srcObject = stream;

            // Set up RTCPeerConnection and other necessary steps
            // ...
        })
        .catch(function(err) {
            console.error('Error accessing media devices: ', err);
        });
}

// Call the function to start the video call when the page loads
window.onload = function() {
    startVideoCall();
};
