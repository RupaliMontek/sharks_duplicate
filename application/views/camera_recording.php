<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Recorder with Timer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #videoContainer {
            position: relative;
            width: 640px;
            height: 480px;
            margin-bottom: 20px;
        }
        #preview, #recordedVideo {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-color: black;
        }
        #timerDisplay {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 18px;
        }
        .controls {
            margin-top: 10px;
        }
        button {
            margin: 0 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        button:disabled {
            opacity: 0.5;
            cursor: default;
        }
    </style>
</head>
<body>
    <h1>Video Recorder with Timer</h1>
    <div id="videoContainer">
        <video id="preview" autoplay></video>
        <div id="timerDisplay">00:00</div>
    </div>
    <div class="controls">
        <button id="startButton">Start Recording</button>
        <button id="stopButton" disabled>Stop Recording</button>
        <button id="saveButton" disabled>Save Recording</button>
    </div>
    <video id="recordedVideo" width="640" height="480" controls style="display: none;"></video>

    <script>
        let mediaRecorder;
        let recordedBlobs;
        let stream;
        let timerInterval;
        let recordingTime = 120; // 2 minutes in seconds
        const countdownDisplay = document.getElementById('timerDisplay');
        const preview = document.getElementById('preview');
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const saveButton = document.getElementById('saveButton');
        const recordedVideo = document.getElementById('recordedVideo');
        
        startButton.addEventListener('click', startRecording);
        stopButton.addEventListener('click', stopRecording);
        saveButton.addEventListener('click', saveRecording);

        navigator.mediaDevices.getUserMedia({ video: true, audio: true })
            .then(localStream => {
                preview.srcObject = localStream;
                stream = localStream;
            })
            .catch(error => {
                console.error('Error accessing media devices.', error);
            });

        function startRecording() {
            recordedBlobs = [];
            const mimeTypes = [
                'video/webm;codecs=vp9',
                'video/webm;codecs=vp8',
                'video/webm',
                'video/mp4'
            ];

            let options = mimeTypes.find(type => MediaRecorder.isTypeSupported(type));
            if (!options) {
                console.error('No supported MIME type found for MediaRecorder.');
                return;
            }

            console.log(`Using MIME type: ${options}`);
            try {
                mediaRecorder = new MediaRecorder(stream, { mimeType: options });
            } catch (e) {
                console.error('Exception while creating MediaRecorder:', e);
                return;
            }

            startButton.disabled = true;
            stopButton.disabled = false;
            saveButton.disabled = true;

            mediaRecorder.onstop = (event) => {
                console.log('Recorder stopped:', event);
                clearInterval(timerInterval);
                countdownDisplay.textContent = '00:00';

                // Call save function when recording stops
                saveRecording();
            };
            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.start();
            console.log('MediaRecorder started', mediaRecorder);

            // Start countdown timer
            startTimer();
        }

        function startTimer() {
            let secondsLeft = recordingTime;
            updateTimerDisplay(secondsLeft);

            timerInterval = setInterval(() => {
                secondsLeft--;
                updateTimerDisplay(secondsLeft);

                if (secondsLeft <= 0) {
                    stopRecording();
                }
            }, 1000);
        }

        function updateTimerDisplay(secondsLeft) {
            const minutes = Math.floor(secondsLeft / 60);
            const seconds = secondsLeft % 60;
            const formattedTime = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            countdownDisplay.textContent = formattedTime;
        }

        function stopRecording() {
            mediaRecorder.stop();
            startButton.disabled = false;
            stopButton.disabled = true;
            saveButton.disabled = false;
            console.log('Recorded Blobs:', recordedBlobs);

            const superBuffer = new Blob(recordedBlobs, { type: 'video/webm' });
            const videoURL = window.URL.createObjectURL(superBuffer);

            recordedVideo.src = videoURL;
            recordedVideo.style.display = 'block';

            // Attempt to play the video
            recordedVideo.play().catch(error => {
                console.error('Error playing video:', error);
            });

            // Cleanup blob URL after use
            recordedVideo.onended = () => {
                window.URL.revokeObjectURL(videoURL);
                recordedVideo.style.display = 'none';
            };

            clearInterval(timerInterval);
            countdownDisplay.textContent = '00:00';
        }

        function handleDataAvailable(event) {
            console.log('Data available:', event);
            if (event.data && event.data.size > 0) {
                recordedBlobs.push(event.data);
                console.log('Blob added:', event.data);
            }
        }

        function saveRecording() {
            const blob = new Blob(recordedBlobs, { type: 'video/webm' });
            const url = '<?php echo site_url('Registration/upload'); ?>';
            const formData = new FormData();
            formData.append('video', blob, 'recording.webm');

            fetch(url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Update preview with the saved video path
                if (data.success && data.file_path) {
                    preview.src = data.file_path;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
