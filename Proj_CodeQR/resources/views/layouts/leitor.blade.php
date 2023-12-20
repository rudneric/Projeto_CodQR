<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <style>
        body {
          display: flex;
          align-items: center;
          justify-content: center;
          height: 100vh;
          margin: 0;
          background-color: #f4f4f4;
          font-family: 'Arial', sans-serif;
        }
    
        #camera-container {
          text-align: center;
          background-color: #ffffff;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          padding: 20px;
          position: relative;
        }
    
        #qr-video {
          max-width: 100%;
          height: auto;
          border: 1px solid #ddd;
          border-radius: 6px;
          margin-bottom: 20px;
        }
      </style>
    </head>

    <body>

        <div id="camera-container">
            <video id="qr-video" playsinline></video>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const video = document.getElementById('qr-video');
                let scanner;
        
                navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                    .then((stream) => {
                        video.srcObject = stream;
                        video.play();
        
                        // Instancia o scanner
                        scanner = new Instascan.Scanner({
                            video: video
                        });
        
                        // Adiciona um ouvinte de evento para cada leitura de QR Code
                        scanner.addListener('scan', function(content) {
                            // Decodifica a URL e redireciona
                            let decodedURL = decodeURIComponent(content);
                            window.location.href = decodedURL;
        
                            // Desativa a câmera após a leitura
                            scanner.stop();
                        });
        
                        // Obtém as câmeras disponíveis
                        Instascan.Camera.getCameras().then(function(cameras) {
                            if (cameras.length > 0) {
                                // Inicia a câmera
                                scanner.start(cameras[0]);
                            } else {
                                console.error('Nenhuma câmera encontrada.');
                            }
                        }).catch(function(e) {
                            console.error(e);
                        });
        
                        requestAnimationFrame(tick);
                    })
                    .catch((error) => {
                        console.error('Erro ao acessar a câmera: ', error);
                    });
        
                function tick() {
                    if (video.readyState === video.HAVE_ENOUGH_DATA) {
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                        context.drawImage(video, 0, 0, canvas.width, canvas.height);
                        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, imageData.width, imageData.height);
        
                        if (code) {
                            // Redirecionar para a URL indicada
                            window.location.href = code.data;
        
                            // Desativa a câmera após a leitura
                            scanner.stop();
                        }
        
                        requestAnimationFrame(tick);
                    } else {
                        requestAnimationFrame(tick);
                    }
                }
            });
        

            // Chama a função de iniciar a câmera ao carregar a página
            document.addEventListener('DOMContentLoaded', function() {
                iniciarCamera();
            });
        </script>
    </body>

</html>
