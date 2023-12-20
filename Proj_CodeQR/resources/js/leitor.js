document.addEventListener('DOMContentLoaded', function () {
    const videoElement = document.getElementById('video');
    const resultElement = document.getElementById('result');
    const startScanButton = document.getElementById('startScan');
  
    // Inicializar o leitor Instascan
    const scanner = new Instascan.Scanner({ video: videoElement });
  
    // Adicionar um ouvinte de eventos para lidar com a leitura do QR code
    scanner.addListener('scan', function (content) {
      resultElement.textContent = 'QR Code lido: ' + content;
    });
  
    // Adicionar um ouvinte de eventos para iniciar a leitura quando o botão é clicado
    startScanButton.addEventListener('click', function () {
      // Inicializar a câmera
      Instascan.Camera.getCameras()
        .then(function (cameras) {
          if (cameras.length > 0) {
            videoElement.style.display = 'block'; // Mostrar o vídeo
            startScanButton.disabled = true; // Desabilitar o botão após o início da leitura
            scanner.start(cameras[0]); // Iniciar o leitor usando a primeira câmera disponível
          } else {
            console.error('Nenhuma câmera encontrada.');
          }
        })
        .catch(function (error) {
          console.error('Erro ao acessar a câmera:', error);
        });
    });
  });