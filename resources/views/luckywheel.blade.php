<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Wheel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/wh.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .wheel-button {
            display: none;
        }
        .wheel {
            display: block;
            width: 300px; /* Adjust the size of the wheel as needed */
            height: 300px;
            transition: transform 5s ease-out;
        }
        @media (min-width: 768px) and (max-width: 1024px) {
            .wheel-button {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <button class="btn btn-primary wheel-button" onclick="triggerSpin()">Spin the Wheel</button>
        <img src="images/wheel.png" alt="Wheel" class="wheel" id="wheel">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function triggerSpin() {
            const wheel = document.getElementById('wheel');
            const randomDegree = Math.floor(Math.random() * 360) + 3600; // Ensure a full rotation plus a random degree
            wheel.style.transform = `rotate(${randomDegree}deg)`;
        }
    </script>
</body>
</html>
