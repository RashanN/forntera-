<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/wh.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .winner-gif {
            display: none;
            width: 300px; /* Adjust as needed */
            height: 300px; /* Adjust as needed */
        }

        .text-box {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
      
        @if($spin)
            <img src="images/winner.gif" alt="Winner" class="winner-gif" id="winnerGif">
        @endif

        <div class="text-box" id="textBox">
            <input type="text" class="form-control" placeholder="Member Code" value="{{ $memberCode }}">
        </div>
        
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Display the GIF if spin is true
            @if ($spin)
                document.getElementById('winnerGif').style.display = 'block';
               // document.getElementById('textBox').style.display = 'block';
            @endif
            
            // Show the text box after 10 seconds
        
            setTimeout(function() {
                document.getElementById('textBox').style.display = 'block';
            }, 5000); 
            // Refresh the page after 15 seconds
            setTimeout(function() {
                window.location.reload();
            },10000); // 15000 milliseconds = 15 seconds
        });
    </script>
</body>
</html>
