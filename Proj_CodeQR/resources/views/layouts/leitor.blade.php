<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="shortcut icon" type="imagex/png" href="/img/img_site/logo_oficial.png">

    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <title>SAB</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
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
            height: 100%;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        @media (min-width: 540px) {

            /* Estilos específicos para telas com largura igual ou superior a 540px */
            #camera-container {
                max-width: 100%;
                height: 50vh;
                margin-left: 0%;
                margin-right: 0%;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="container-fluid fixed-top" style="background: white;">
                <nav class="navbar navbar-expand-lg shadow-5-strong float">
                    <div class="mx-auto text-center">
                        <a class="navbar-brand" href="/dashboard"><img src="/img/img_site/logo_oficial.png"
                                width="70" height="70" alt=""></a>
                    </div>
                </nav>
            </div>

            <div class="container-fluid">

                <div class="row row-cols-1" id="container-video">

                    <div id="camera-container">
                        <video id="qr-video" playsinline></video>
                    </div>

                    <button id="ativar-camera"
                        class=" btn btn-lg btn-outline-warning rounded-pill shadow-sm mt-3 rounded">Ativar
                        Câmera</button>

                    <button class="btn btn-lg btn-outline-warning rounded-pill shadow-sm mt-3 rounded"
                        onclick="redirectToHome()">Home</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Função para iniciar a câmera
        function iniciarCamera() {
            const video = document.getElementById('qr-video');
            let scanner;

            navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'environment'
                    }
                })
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
        }

        // Adiciona um ouvinte de evento ao botão para chamar a função de iniciar a câmera
        document.getElementById('ativar-camera').addEventListener('click', function() {
            iniciarCamera();
            // Oculta o botão após ativá-lo (opcional)
            this.style.display = 'none';
        });

        function redirectToHome() {
            window.location.href = '/dashboard';
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
