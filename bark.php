<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human to Dog Translator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .translator-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ff5e62;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e04a50;
        }

        #message {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #42b883;
        }
    </style>
</head>

<body>

    <div class="translator-container">
        <h2>Human to Dog Translator</h2>
        <textarea id="userInput" placeholder="Enter text to translate..."></textarea>
        <button onclick="playBarkSound()">Translate</button>
        <p id="message"></p>
    </div>

    <audio id="barkSound" src="/PetLover/dog-barking-70772.mp3"></audio> <!-- Replace with your sound file -->

    <script>
        function playBarkSound() {
            let text = document.getElementById("userInput").value.trim();
            let wordCount = text.split(/\s+/).filter(word => word !== "").length; // Count words
            let messageElement = document.getElementById("message");
            let audio = document.getElementById("barkSound");

            if (wordCount === 0) {
                messageElement.innerText = "Please enter some text!";
                return;
            }

            // Show translated message
            messageElement.innerText = "Woof! Woof! Your message has been translated.";

            let playTime = wordCount * 2; // Each word plays for 2 seconds (adjust as needed)
            let maxPlayTime = 15; // Max playtime is 15 seconds
            let finalPlayTime = Math.min(playTime, maxPlayTime); // Ensure it doesn't exceed 15 sec

            audio.currentTime = 0; // Restart the audio
            audio.play();

            setTimeout(() => {
                audio.pause();
                audio.currentTime = 0; // Reset audio
            }, finalPlayTime * 1000); // Convert seconds to milliseconds
        }
    </script>

</body>

</html>