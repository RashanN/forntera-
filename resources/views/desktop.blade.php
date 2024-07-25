<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Wheel - Desktop</title>
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
        .wheel {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <img src="images/wheel.png" alt="" class="wheel" id="wheel">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function checkSpinState() {
            fetch('{{ route('get-spin-state') }}')
                .then(response => response.json())
                .then(data => {
                    if (data.spin) {
                        spinTheWheel();
                    }
                });
        }

        function spinTheWheel() {
            const wheel = document.getElementById('wheel');
            const randomDegree = Math.floor(Math.random() * 360) + 3600; // Ensure a full rotation plus a random degree
            wheel.style.transition = 'transform 5s ease-out';
            wheel.style.transform = `rotate(${randomDegree}deg)`;
            setTimeout(() => {
                wheel.style.transition = '';
                wheel.style.transform = '';
            }, 5000);
        }

        setInterval(checkSpinState, 2000); // Check the spin state every 2 seconds
    </script>
</body>
</html>
