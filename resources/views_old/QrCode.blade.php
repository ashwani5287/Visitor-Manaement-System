<!DOCTYPE html>
<html>
<head>
    <title>QR Code Scanner (Webcam)</title>
    <script src="{{ asset('jqueryCdn.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@2.1.0/dist/jsQR.min.js"></script>
</head>
<body>
    <h1>QR Code Scanner (Webcam)</h1>
    <video id="video" autoplay></video>
    <canvas id="canvas" style="display: none;"></canvas>
    <div id="qr-result"></div>
    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const qrResult = document.getElementById('qr-result');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(error => {
                qrResult.textContent = "Error accessing camera: " + error;
            });

        function scanQRCode() {
            const context = canvas.getContext('2d');
            const width = video.videoWidth;
            const height = video.videoHeight;
            canvas.width = width;
            canvas.height = height;
            context.drawImage(video, 0, 0, width, height);
            const imageData = context.getImageData(0, 0, width, height);
            const code = jsQR(imageData.data, width, height);
            if (code) {
                qrResult.textContent = "Decoded Text: " + code.data;
            } else {
                qrResult.textContent = "QR Code not found!";
            }
            requestAnimationFrame(scanQRCode);
        }

        video.addEventListener('loadedmetadata', function() {
            scanQRCode();
        });
    </script>
</body>
</html>
