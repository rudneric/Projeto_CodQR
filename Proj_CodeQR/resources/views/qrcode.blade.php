<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRcode</title>
</head>
<body>
    <center>
    <h1>QR Code Gerado:</h1>
    <img src="data:image/svg+xml;base64,{{ base64_encode($svg) }}" alt="QR Code">
    </center>
</body>
</html>