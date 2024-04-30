<?php
// Inclure le fichier sms.php où se trouve la fonction sendSMS
require_once 'sms.php';

// Votre logique de traitement pour le clic sur le bouton Join
// Supposons que vous récupérez le numéro de téléphone de l'utilisateur à partir d'une variable $phoneNumber

// Appeler la fonction sendSMS pour envoyer la notification SMS
$phoneNumber = '21625989919'; // Remplacez ceci par le numéro de téléphone réel
sendSMS($phoneNumber);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Join Meeting</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }
        
        .video-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70%;
            background-color: #000;
            overflow: hidden;
        }
        
        #localVideo {
            width: auto;
            height: 100%;
        }

        /* Style for the mute button */
        .mute-button {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Chat styling */
        .chat-container {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .chat-input {
            width: calc(100% - 120px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            font-size: 16px;
        }

        .send-button {
            width: 100px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
        }

        .message-container {
            margin-top: 20px;
        }

        .message {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            margin-bottom: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <video id="localVideo" autoplay muted></video>
        <button id="muteButton" class="mute-button" onclick="toggleMute()">Mute</button>
    </div>
    
    <!-- Chat Interface -->
    <div class="chat-container">
        <input type="text" id="chatInput" class="chat-input" placeholder="Type your message...">
        <button onclick="sendMessage()" class="send-button">Send</button>
        <div id="messageContainer" class="message-container"></div>
    </div>
    
    <!-- Include scripts for WebRTC functionality -->
    <script src="webrtc.js"></script>
    <script>
        // Function to send chat message
        function sendMessage() {
            var messageInput = document.getElementById("chatInput");
            var message = messageInput.value;
            if (message.trim() !== "") {
                // Display message in chat container
                displayMessage("You: " + message);
                // You can send the message to the teacher or owner here
                // For simplicity, we're just logging the message to console
                console.log("Message to teacher: " + message);
                // Clear input field
                messageInput.value = "";
            }
        }

        // Function to display received message in chat container
        function displayMessage(message) {
            var messageContainer = document.getElementById("messageContainer");
            var messageElement = document.createElement("div");
            messageElement.textContent = message;
            messageElement.classList.add("message");
            messageContainer.appendChild(messageElement);
        }

        function toggleMute() {
            var video = document.getElementById('localVideo');
            if (video.muted) {
                video.muted = false;
                document.getElementById('muteButton').textContent = 'Mute';
            } else {
                video.muted = true;
                document.getElementById('muteButton').textContent = 'Unmute';
            }
        }
    </script>
</body>
</html>
